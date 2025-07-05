<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * ZQverse 主题设置面板
 * 兼容 Typecho 1.2+
 * 分组清晰，字段安全，注释详细
 */
function themeConfig(Typecho_Widget_Helper_Form $form)
{
    // =========================
    // 基础设置
    // =========================
    echo '<div style="margin:20px 0 10px 0;padding:8px 0 4px 0;font-weight:bold;font-size:16px;border-bottom:1px solid #eee;">基础设置</div>';

    // Logo图片地址
    $logo_url = new Typecho_Widget_Helper_Form_Element_Text(
        'logo_url',
        NULL,
        '',
        'Logo图片地址',
        '请输入网站LOGO图片的完整URL地址，建议使用https。'
    );
    $form->addInput($logo_url);

    // 网站副标题
    $subtitle = new Typecho_Widget_Helper_Form_Element_Text(
        'subtitle',
        NULL,
        '',
        '网站副标题',
        '显示在网站主标题下方的副标题，支持中英文。'
    );
    $form->addInput($subtitle);

    // 网站标题附加名
    $title_append = new Typecho_Widget_Helper_Form_Element_Text(
        'title_append',
        NULL,
        '',
        '网站标题附加名',
        '显示在网页标题（title）后缀，便于SEO优化。'
    );
    $form->addInput($title_append);

    // =========================
    // 外观样式
    // =========================
    echo '<div style="margin:20px 0 10px 0;padding:8px 0 4px 0;font-weight:bold;font-size:16px;border-bottom:1px solid #eee;">外观样式</div>';

    // 主题主色调
    $main_color = new Typecho_Widget_Helper_Form_Element_Text(
        'main_color',
        NULL,
        '#409EFF',
        '主题主色调',
        '请输入主题主色调的16进制颜色值（如 #409EFF），用于按钮、链接等高亮色。'
    );
    $form->addInput($main_color);

    // 夜间模式开关
    $night_mode = new Typecho_Widget_Helper_Form_Element_Radio(
        'night_mode',
        array(
            '0' => '关闭',
            '1' => '开启'
        ),
        '0',
        '夜间模式',
        '开启后，网站将自动切换为夜间深色风格。'
    );
    $form->addInput($night_mode);

    // 字体设置
    $font_family = new Typecho_Widget_Helper_Form_Element_Select(
        'font_family',
        array(
            'system' => '系统默认',
            'sans-serif' => '无衬线字体（如微软雅黑）',
            'serif' => '衬线字体（如宋体）',
            'custom' => '自定义'
        ),
        'system',
        '字体设置',
        '选择网站主要字体风格。选择"自定义"后请在自定义CSS中设置 font-family。'
    );
    $form->addInput($font_family);

    // =========================
    // 文章与列表
    // =========================
    echo '<div style="margin:20px 0 10px 0;padding:8px 0 4px 0;font-weight:bold;font-size:16px;border-bottom:1px solid #eee;">文章与列表</div>';

    // 文章摘要字数
    $excerpt_length = new Typecho_Widget_Helper_Form_Element_Text(
        'excerpt_length',
        NULL,
        '120',
        '文章摘要字数',
        '设置文章摘要显示的最大字数，建议范围 50~200。'
    );
    $form->addInput($excerpt_length->inputFilter('int'));

    // 首页显示篇数
    $index_limit = new Typecho_Widget_Helper_Form_Element_Text(
        'index_limit',
        NULL,
        '10',
        '首页显示篇数',
        '设置首页每页显示的文章数量，建议范围 5~20。'
    );
    $form->addInput($index_limit->inputFilter('int'));

    // 是否开启缩略图
    $enable_thumbnail = new Typecho_Widget_Helper_Form_Element_Radio(
        'enable_thumbnail',
        array(
            '1' => '开启',
            '0' => '关闭'
        ),
        '1',
        '文章缩略图',
        '开启后，文章列表将显示缩略图（如无特色图则自动获取首图）。'
    );
    $form->addInput($enable_thumbnail);

    // 置顶文章设置
    $sticky_posts = new Typecho_Widget_Helper_Form_Element_Textarea(
        'sticky_posts',
        NULL,
        '',
        '置顶文章ID',
        '请输入需要置顶的文章ID，多个请用英文逗号或换行分隔。填写后，这些文章会在首页优先显示。'
    );
    $form->addInput($sticky_posts);

    // =========================
    // 自定义扩展
    // =========================
    echo '<div style="margin:20px 0 10px 0;padding:8px 0 4px 0;font-weight:bold;font-size:16px;border-bottom:1px solid #eee;">自定义扩展</div>';

    // 自定义头部代码
    $custom_head = new Typecho_Widget_Helper_Form_Element_Textarea(
        'custom_head',
        NULL,
        '',
        '自定义头部代码',
        '可在此处添加统计、验证、meta等代码，自动插入到&lt;head&gt;标签内。请确保代码安全、无XSS风险。'
    );
    $form->addInput($custom_head);

    // 自定义底部代码
    $custom_footer = new Typecho_Widget_Helper_Form_Element_Textarea(
        'custom_footer',
        NULL,
        '',
        '自定义底部代码',
        '可在此处添加统计、JS等代码，自动插入到&lt;/body&gt;前。请确保代码安全、无XSS风险。'
    );
    $form->addInput($custom_footer);

    // 自定义CSS
    $custom_css = new Typecho_Widget_Helper_Form_Element_Textarea(
        'custom_css',
        NULL,
        '',
        '自定义CSS样式',
        '可在此处直接编写CSS代码，自动插入到页面样式表末尾。'
    );
    $form->addInput($custom_css);

    // 自定义页脚内容
    $footer_custom = new Typecho_Widget_Helper_Form_Element_Textarea(
        'footer_custom',
        NULL,
        '<!-- 可用的动态内容选项 - 您可以直接修改以下内容 -->
<!-- 1. 关于页面链接 -->
<?php $aboutLink = getHidePage($this, \'about\'); ?>
<?php if (!empty($aboutLink["href"])): ?>
<div class="footer-item">
  <a href="<?php echo $aboutLink["href"]; ?>" target="_self" title="<?php echo $aboutLink["title"]; ?>"><?php echo $aboutLink["title"]; ?></a>
</div>
<?php endif; ?>

<!-- 2. 友情链接页面 -->
<?php $linksLink = getHidePage($this, \'links\'); ?>
<?php if (!empty($linksLink["href"])): ?>
<div class="footer-item">
  <a href="<?php echo $linksLink["href"]; ?>" target="_self" title="<?php echo $linksLink["title"]; ?>"><?php echo $linksLink["title"]; ?></a>
</div>
<?php endif; ?>

<!-- 3. 站点地图 -->
<div class="footer-item">
  <a href="<?php $this->options->siteUrl();?>sitemap.xml" target="_blank" title="站点地图">站点地图</a>
</div>

<!-- 4. 版权信息 -->
<div class="footer-item">
  版权所有：<?php $this->options->title();?>
</div>

<!-- 5. 联系地址（可在下方"底部联系地址"字段设置） -->
<div class="footer-item">
  联系地址：<?php $this->options->address();?>
</div>

<!-- 6. 联系邮箱 -->
<div class="footer-item">
  <span>联系邮箱：</span><a href="mailto:<?php $this->author->mail();?>" target="_self"><?php $this->author->mail();?></a>
</div>

<!-- 7. 版权年份和网站标题 -->
<div class="footer-item">
  <a href="<?php $this->options->siteUrl();?>" target="_self" title="<?php $this->options->title();?>">&copy;<?php echo date(\'Y\'); ?> <?php $this->options->title();?></a>
</div>

<!-- 8. 备案信息（可在上方"备案信息"字段设置） -->
<?php $this->options->filing();?>

<!-- 9. Typecho 链接 -->
<div class="footer-item">
  Blog By <a href="http://typecho.org" target="_blank" title="Typecho">Typecho</a>
</div>

<!-- 10. 自定义备案信息示例 -->
<div class="footer-item">
  <a href="https://beian.miit.gov.cn/" target="_blank" rel="noopener nofollow">京ICP备12345678号-1</a>
</div>

<!-- 11. 自定义友情链接示例 -->
<div class="footer-item">
  <a href="https://example.com" target="_blank" rel="noopener nofollow">友情链接</a>
</div>

<!-- 12. 自定义版权声明示例 -->
<div class="footer-item">
  版权所有 © 2024 我的网站，保留所有权利
</div>',
        '页脚自定义内容',
        '支持 HTML 和 PHP 代码。上方显示了所有可用的动态内容选项作为模板，您可以直接修改、删除或添加内容。留空则使用默认页脚内容。'
    );
    $form->addInput($footer_custom);
} 
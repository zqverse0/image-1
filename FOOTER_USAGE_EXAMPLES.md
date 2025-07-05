# ZQverse 主题页脚自定义功能使用示例

## 后台设置位置

1. 登录 Typecho 后台
2. 进入 "控制台" → "外观" → "设置外观"
3. 找到 "页脚自定义内容" 字段

## 使用示例

### 示例 1：只显示版权和备案信息

在输入框中保留以下内容：

```php
<!-- 版权年份和网站标题 -->
<div class="footer-item">
  <a href="<?php $this->options->siteUrl();?>" target="_self" title="<?php $this->options->title();?>">&copy;<?php echo date('Y'); ?> <?php $this->options->title();?></a>
</div>

<!-- 备案信息 -->
<?php $this->options->filing();?>
```

### 示例 2：显示版权、联系信息和自定义备案

```php
<!-- 版权年份和网站标题 -->
<div class="footer-item">
  <a href="<?php $this->options->siteUrl();?>" target="_self" title="<?php $this->options->title();?>">&copy;<?php echo date('Y'); ?> <?php $this->options->title();?></a>
</div>

<!-- 联系邮箱 -->
<div class="footer-item">
  <span>联系邮箱：</span><a href="mailto:<?php $this->author->mail();?>" target="_self"><?php $this->author->mail();?></a>
</div>

<!-- 自定义备案信息 -->
<div class="footer-item">
  <a href="https://beian.miit.gov.cn/" target="_blank" rel="noopener nofollow">京ICP备12345678号-1</a>
</div>
```

### 示例 3：显示友情链接和站点地图

```php
<!-- 友情链接页面 -->
<?php $linksLink = getHidePage($this, 'links'); ?>
<?php if (!empty($linksLink["href"])): ?>
<div class="footer-item">
  <a href="<?php echo $linksLink["href"]; ?>" target="_self" title="<?php echo $linksLink["title"]; ?>"><?php echo $linksLink["title"]; ?></a>
</div>
<?php endif; ?>

<!-- 站点地图 -->
<div class="footer-item">
  <a href="<?php $this->options->siteUrl();?>sitemap.xml" target="_blank" title="站点地图">站点地图</a>
</div>

<!-- 版权信息 -->
<div class="footer-item">
  版权所有：<?php $this->options->title();?>
</div>
```

### 示例 4：添加自定义友情链接

```php
<!-- 版权年份和网站标题 -->
<div class="footer-item">
  <a href="<?php $this->options->siteUrl();?>" target="_self" title="<?php $this->options->title();?>">&copy;<?php echo date('Y'); ?> <?php $this->options->title();?></a>
</div>

<!-- 自定义友情链接 -->
<div class="footer-item">
  <a href="https://example1.com" target="_blank" rel="noopener nofollow">友情链接1</a>
</div>
<div class="footer-item">
  <a href="https://example2.com" target="_blank" rel="noopener nofollow">友情链接2</a>
</div>

<!-- 备案信息 -->
<?php $this->options->filing();?>
```

## 可用的动态变量

在自定义内容中，您可以使用以下动态变量：

| 变量 | 说明 | 示例 |
|------|------|------|
| `<?php $this->options->title();?>` | 网站标题 | 我的博客 |
| `<?php $this->options->siteUrl();?>` | 网站地址 | https://example.com |
| `<?php $this->author->mail();?>` | 作者邮箱 | admin@example.com |
| `<?php echo date('Y'); ?>` | 当前年份 | 2024 |
| `<?php $this->options->address();?>` | 联系地址 | 北京市朝阳区 |
| `<?php $this->options->filing();?>` | 备案信息 | 京ICP备12345678号 |

## 注释说明

- 使用 `<!-- -->` 注释掉不需要的 HTML 内容
- 使用 `<?php /* */ ?>` 注释掉不需要的 PHP 代码
- 注释掉的内容不会显示在页脚中

## 注意事项

1. **保持样式一致：** 建议使用 `footer-item` 类名
2. **测试显示效果：** 修改后在不同页面测试
3. **备份设置：** 重要修改前建议备份
4. **字段关联：** 联系地址和备案信息可在其他字段设置 
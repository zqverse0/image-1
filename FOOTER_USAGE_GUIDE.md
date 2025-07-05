# ZQverse 主题页脚自定义功能使用指南

## 功能特点

✅ **所有选项已释放** - 不再需要注释/取消注释，所有内容都直接可用  
✅ **模板化设计** - 提供完整的模板，可直接修改  
✅ **动态内容支持** - 支持 PHP 代码和动态变量  
✅ **安全输出** - 防止 XSS 攻击  

## 后台设置位置

1. 登录 Typecho 后台
2. 进入 "控制台" → "外观" → "设置外观"
3. 找到 "页脚自定义内容" 字段

## 可用的内容选项

### 动态内容（自动获取）
1. **关于页面链接** - 自动检测并显示关于页面
2. **友情链接页面** - 自动检测并显示友情链接页面
3. **站点地图** - 链接到 sitemap.xml
4. **版权信息** - 显示网站标题
5. **联系地址** - 可在"底部联系地址"字段设置
6. **联系邮箱** - 显示作者邮箱
7. **版权年份和网站标题** - 动态年份 + 网站标题
8. **备案信息** - 可在"备案信息"字段设置
9. **Typecho 链接** - 显示 "Blog By Typecho"

### 自定义内容模板
10. **自定义备案信息示例** - 可直接修改的备案信息
11. **自定义友情链接示例** - 可直接修改的友情链接
12. **自定义版权声明示例** - 可直接修改的版权声明

## 使用方法

### 方法一：直接修改模板
1. 在输入框中，您会看到所有可用的内容选项
2. 直接修改您需要的内容，比如：
   - 修改备案号：`京ICP备12345678号-1` → `您的备案号`
   - 修改友情链接：`https://example.com` → `您的链接`
   - 修改版权声明：`我的网站` → `您的网站名`

### 方法二：删除不需要的内容
1. 删除您不需要显示的项目
2. 保留您需要的内容
3. 保存设置

### 方法三：添加新内容
1. 在任意位置添加您自己的内容
2. 使用 `footer-item` 类名保持样式一致
3. 保存设置

## 使用示例

### 示例 1：简洁版页脚
只保留版权和备案信息：

```php
<!-- 版权年份和网站标题 -->
<div class="footer-item">
  <a href="<?php $this->options->siteUrl();?>" target="_self" title="<?php $this->options->title();?>">&copy;<?php echo date('Y'); ?> <?php $this->options->title();?></a>
</div>

<!-- 自定义备案信息 -->
<div class="footer-item">
  <a href="https://beian.miit.gov.cn/" target="_blank" rel="noopener nofollow">您的备案号</a>
</div>
```

### 示例 2：完整版页脚
保留所有动态内容：

```php
<!-- 关于页面链接 -->
<?php $aboutLink = getHidePage($this, 'about'); ?>
<?php if (!empty($aboutLink["href"])): ?>
<div class="footer-item">
  <a href="<?php echo $aboutLink["href"]; ?>" target="_self" title="<?php echo $aboutLink["title"]; ?>"><?php echo $aboutLink["title"]; ?></a>
</div>
<?php endif; ?>

<!-- 友情链接页面 -->
<?php $linksLink = getHidePage($this, 'links'); ?>
<?php if (!empty($linksLink["href"])): ?>
<div class="footer-item">
  <a href="<?php echo $linksLink["href"]; ?>" target="_self" title="<?php echo $linksLink["title"]; ?>"><?php echo $linksLink["title"]; ?></a>
</div>
<?php endif; ?>

<!-- 版权年份和网站标题 -->
<div class="footer-item">
  <a href="<?php $this->options->siteUrl();?>" target="_self" title="<?php $this->options->title();?>">&copy;<?php echo date('Y'); ?> <?php $this->options->title();?></a>
</div>

<!-- 备案信息 -->
<?php $this->options->filing();?>
```

## 可用的动态变量

| 变量 | 说明 | 示例 |
|------|------|------|
| `<?php $this->options->title();?>` | 网站标题 | 我的博客 |
| `<?php $this->options->siteUrl();?>` | 网站地址 | https://example.com |
| `<?php $this->author->mail();?>` | 作者邮箱 | admin@example.com |
| `<?php echo date('Y'); ?>` | 当前年份 | 2024 |
| `<?php $this->options->address();?>` | 联系地址 | 北京市朝阳区 |
| `<?php $this->options->filing();?>` | 备案信息 | 京ICP备12345678号 |

## 注意事项

1. **保持样式一致** - 建议使用 `footer-item` 类名
2. **测试显示效果** - 修改后在不同页面测试
3. **备份设置** - 重要修改前建议备份
4. **字段关联** - 联系地址和备案信息可在其他字段设置
5. **PHP 代码** - 支持完整的 PHP 代码和 Typecho 变量

## 常见问题

**Q: 为什么我修改后没有生效？**
A: 请确保保存了设置，并清除浏览器缓存。

**Q: 如何恢复默认页脚？**
A: 将输入框内容清空并保存，系统会自动使用默认页脚。

**Q: 可以添加 JavaScript 代码吗？**
A: 可以，但建议谨慎使用，确保代码安全。

**Q: 如何添加多个友情链接？**
A: 复制友情链接模板，修改链接地址和文字即可。 
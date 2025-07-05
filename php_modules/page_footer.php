<?php
/**
 * 页脚模板
 */
$options = Helper::options();
?>

<footer class="footer">
    <div class="footer-content">
        <?php if ($options->showAboutLink === 'on'): ?>
            <div class="footer-item">
                <a href="<?php $options->siteUrl(); ?>about" target="_blank"><?php echo $options->aboutLinkText ?: '关于'; ?></a>
            </div>
        <?php endif; ?>

        <?php if ($options->showLinksLink === 'on'): ?>
            <div class="footer-item">
                <a href="<?php $options->siteUrl(); ?>links" target="_blank"><?php echo $options->linksLinkText ?: '友情链接'; ?></a>
            </div>
        <?php endif; ?>

        <?php if ($options->showSitemap === 'on'): ?>
            <div class="footer-item">
                <a href="<?php $options->siteUrl(); ?>sitemap.xml" target="_blank"><?php echo $options->sitemapText ?: '站点地图'; ?></a>
            </div>
        <?php endif; ?>

        <?php if ($options->showCopyright === 'on'): ?>
            <div class="footer-item">
                <?php echo $options->copyrightText ?: '版权所有：'; ?><?php echo date('Y'); ?> <?php $options->title(); ?>
            </div>
        <?php endif; ?>

        <?php if ($options->showAddress === 'on'): ?>
            <div class="footer-item">
                <?php echo $options->addressText ?: '联系地址：'; ?><?php $options->address(); ?>
            </div>
        <?php endif; ?>

        <?php if ($options->showEmail === 'on'): ?>
            <div class="footer-item">
                <?php echo $options->emailText ?: '联系邮箱：'; ?><a href="mailto:<?php $options->email ?: 'admin@example.com'; ?>"><?php echo $options->email ?: 'admin@example.com'; ?></a>
            </div>
        <?php endif; ?>

        <?php if ($options->showFiling === 'on' && $options->filingText): ?>
            <div class="footer-item">
                <?php echo $options->filingText; ?>
            </div>
        <?php endif; ?>

        <?php if ($options->showPoweredBy === 'on'): ?>
            <div class="footer-item">
                <?php echo $options->poweredByText ?: 'Blog By Typecho'; ?>
            </div>
        <?php endif; ?>

        <?php if ($options->customFooterContent): ?>
            <?php echo $options->customFooterContent; ?>
        <?php endif; ?>
    </div>
</footer>

<style>
.footer {
    background-color: #f8f9fa;
    padding: 20px 0;
    margin-top: 40px;
    border-top: 1px solid #e9ecef;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 20px;
    font-size: 14px;
    color: #6c757d;
}

.footer-item {
    display: flex;
    align-items: center;
}

.footer-item a {
    color: #6c757d;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-item a:hover {
    color: #007bff;
    text-decoration: underline;
}

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }
}
</style> 
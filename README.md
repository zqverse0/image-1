# ZQverse 主题文件结构说明

## 目录结构

- 根目录
  - 主题入口与主模板文件（index.php, post.php, ...）
  - 主题配置与功能（functions.php, options.php）
  - 说明文档与截图（FOOTER_*.md, README.md, screenshot.png）

- php_modules/
  - 主题各功能模块与模板（header, footer, nav, 文章、评论、通知、分类、归档等）
  - 所有 PHP 文件均可二次开发

- static/
  - scripts/：自定义 JS 脚本（建议源码开发，生产环境打包到 dist/scripts/）
  - css/：主题、markdown、代码高亮等样式（可按需精简）
  - images/：主题图片、emoji、favicon 等（可按需精简）
  - game/：小游戏相关资源（如不需要可删除）

- dist/
  - scripts/：打包压缩 JS 及 manifest（**仅生产环境用，压缩/混淆/带 hash，不建议直接修改**）
  - styles/：打包压缩 CSS 及 gzip（同上）
  - images/、head/、fonts/：打包图片、模板、字体

## 文件标记说明

- ✅ 可二次开发/建议保留
- ⚠️ 仅生产环境用/影响加载速度/不可二开
- 🗑️ 可按需清理/冗余

## 详细文件列表

| 路径/文件                        | 说明                         | 标记 |
|-----------------------------------|------------------------------|------|
| functions.php, options.php        | 主题核心功能                 | ✅   |
| index.php, post.php, ...          | 主题主模板                   | ✅   |
| php_modules/                      | 所有功能模块                 | ✅   |
| static/scripts/globalError.js     | 自定义 JS                    | ✅   |
| static/scripts/nav-hover-disable.js| 自定义 JS                    | ✅   |
| static/css/                       | 主题/markdown/高亮样式       | ✅   |
| static/images/                    | 主题图片/emoji/favicon       | ✅   |
| static/game/                      | 小游戏资源（如无用可删）     | 🗑️   |
| dist/scripts/*.js                 | 压缩/混淆/带 hash JS         | ⚠️   |
| dist/scripts/*manifest*.js        | 运行时/依赖清单              | ⚠️   |
| dist/styles/*.css                 | 压缩/带 hash CSS             | ⚠️   |
| dist/styles/*.css.gz              | Gzip 压缩产物（如无用可删）  | 🗑️   |
| dist/fonts/                       | 打包字体                     | ⚠️   |
| dist/images/, dist/head/          | 打包图片/模板                | ⚠️   |
| FOOTER_*.md, README.md, screenshot.png | 说明文档与截图           | ✅   |

## 其它建议

- 开发时建议只修改 `php_modules/`、`static/` 下源码，**不要直接改 dist/**。
- 生产环境如需精简体积，可删除未用到的 `.gz`、多余样式、图片、emoji、小游戏等。
- 若需二次开发，建议保留源码和构建工具，避免只留 dist 产物。

## 第三方外部资源加载明细

本主题源码分析发现如下外部资源加载：

| 链接/域名                        | 用途           | 是否影响加载 | 是否有隐私风险 | 备注                |
|-----------------------------------|----------------|--------------|----------------|---------------------|
| https://cravatar.cn/              | 用户头像       | 有           | 有             | 可替换为本地头像    |
| http://cn.gravatar.org/           | 头像修改入口   | 无           | 有             | 仅跳转              |
| https://YOUR_APP_ID-dsn.algolia.net| DocSearch搜索 | 有           | 有             | 需后台开启才加载    |
| http://typecho.org                | Typecho官网    | 无           | 无             | 仅跳转              |
| https://beian.miit.gov.cn/        | 备案           | 无           | 无             | 仅跳转              |
| https://example.com               | 友情链接       | 无           | 无             | 仅跳转              |
| https://mulingyuer.github.io/ZQverse/ | 主题文档    | 无           | 无             | 仅跳转              |

### 说明
- 头像服务（cravatar/gravatar）和 DocSearch（Algolia）为唯一可能影响加载速度和隐私的外部依赖。
- 其它外链均为点击跳转，不影响页面加载，也无隐私风险。
- 主题未发现第三方统计、广告、CDN 字体/图标库等隐私风险较高的外链。
- 所有主要 CSS、JS、图片、字体等均为本地资源。

---

> 本文档由 AI 自动生成，若有遗漏请补充。 

## 未用 JS/CSS 代码与变量的清理建议

### 1. JS 文件
- 建议用 Chrome DevTools Coverage、webpack-bundle-analyzer、source-map-explorer 等工具检测未用 JS 代码。
- 可重点排查 static/scripts/ 下自定义 JS，dist/scripts/ 下体积较大的 vendors 文件。
- 主题自带但未启用的功能（如小游戏、特殊动画）相关 JS 可安全移除。
- 早期遗留的调试、测试、polyfill 代码可在确认无用后删除。

### 2. CSS 文件
- 建议用 PurgeCSS、UnCSS、Chrome Coverage 工具检测未用样式。
- static/css/markdown/、static/css/highlight/ 下未用到的风格文件可直接删除。
- 主题自带但未用的皮肤、动画、媒体查询样式可在确认无用后删除。
- 兼容性 hack、IE 专用样式如无需求可移除。

### 3. 注意事项
- 建议每次清理后，**全站多端多页面测试**，确保无功能和样式异常。
- 如有源码和构建工具，优先在源码层面清理，避免下次构建被覆盖。
- 生产环境建议保留一份原始备份，便于回滚。

> 本建议仅供参考，具体请结合实际页面和功能需求人工确认。 

## JS 加载顺序与阻塞性优化建议

### 1. 现状分析
- 主题主 JS（dist/scripts/*.js）均已使用 `<script defer>`，不会阻塞 HTML 解析。
- static/scripts/ 下自定义 JS 体积小，部分未加 defer，但通常影响极小。
- 未发现明显的同步阻塞大体积脚本。

### 2. 优化建议
- 建议所有非必须首屏渲染的 JS 均加上 `defer` 属性，或放在 `<body>` 底部。
- 体积较大的第三方脚本（如统计、广告）建议加 `async`。
- 保持主 JS 的 `defer`，确保页面解析与脚本加载并行，提高首屏速度。
- 如有自定义插件或后续新增 JS，优先采用 `defer` 或 `async`。

> 目前主题加载顺序已较为合理，无需强制调整。如有特殊性能需求可进一步细化优化。 

## 测试/调试/模拟相关代码标注与建议

### 1. 发现位置
- static/scripts/globalError.js 第59行：alert('两次输入的密码不一致');（表单校验提示）
- dist/scripts/vendors.d80c1880.js 多处 console.log（库内部警告/兼容提示）
- dist/scripts/vendors.d80c1880.js 第5092行：var e = "__TEST_KEY__";（库内部测试 key）
- 多处提前 return;、.test(...) 为正常兼容性/正则判断

### 2. 建议
- 如需极致优化，可注释 dist/scripts/vendors.d80c1880.js 内的 console.log，但建议保留原始文件。
- globalError.js 的 alert 如无表单校验需求可移除。
- 未发现 mock、demo、if(false) 等测试/模拟分支，业务代码安全。
- 提前 return;、正则 .test(...) 属于正常业务/库实现，不建议随意删除。
- 未用变量/函数建议结合源码和页面功能人工排查。

> 本建议仅供参考，具体请结合实际页面和功能需求人工确认。 
<div align="center">
<img src="https://user-images.githubusercontent.com/7591484/170873489-6aa40fe3-9d5c-476b-9434-f12f0a896c85.png" width="20%">

<h1> Scrawler MVC </h1>

<a href="https://github.com/scrawler-labs/app/actions/workflows/main.yml"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/scrawler-labs/app/main.yml?style=flat-square">
</a>
[![Codecov](https://img.shields.io/codecov/c/gh/scrawler-labs/app?style=flat-square)](https://app.codecov.io/gh/scrawler-labs/app)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/quality/g/scrawler-labs/app?style=flat-square)](https://scrutinizer-ci.com/g/scrawler-labs/app/?branch=main)
<a href="[https://github.com/scrawler-labs/app/actions/workflows/main.yml](https://github.com/scrawler-labs/app/actions/workflows/main.yml)"><img src="https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat-square" alt="PHPStan Enabled"></a>
[![Packagist Version](https://img.shields.io/packagist/v/scrawler/app?style=flat-square)](https://packagist.org/packages/scrawler/app)
[![Packagist License](https://img.shields.io/packagist/l/scrawler/app?style=flat-square)](https://packagist.org/packages/scrawler/app)

<br>

🔥Create simple but powerful web apps and APIs quickly, with minumum lines of code🔥<br>
🇮🇳 Made in India 🇮🇳
</div>

## 💻 Installation
You can install Scrawler App via Composer. If you don't have composer installed , you can download composer from [here](https://getcomposer.org/download/)

or if you want to start with an mvc template
```sh
composer create-project scrawler/mvc <project-name>
```

## ✨ Folder Structure
- `public`: this should be the webroot of your server
  - `assets`: your css and js assets live here
  - `public`: public file of your storage are accessable via this symlink, if this symlink is broken create one yourseld 
- `config`: global configuration files, you can add your own configurations here
- `storage`: app caches , file storage stays here
- `tests`: pest tests for your app lives here
- `src`
  - `Controllers`: auto routed controller classes live here
  - `views`: blade view files live here
  - `boot.php`: boots the framework and register the required services , do not modify
  - `app.php`: you can register your services and configuration here
  - `routes.php`: manual routes can be added here if required


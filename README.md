Add comments to any page on your site.
![image](https://user-images.githubusercontent.com/904958/147882849-1608a077-07a9-4849-9fdc-8617c0952fe8.png)
![image](https://user-images.githubusercontent.com/904958/209520424-863608aa-8dad-4ab9-8fa4-e08892d81263.png)

### Features
* Absolutely free (MIT)
* Moderation
* Show/hide the email field
* Support for tree comments
* The ability to delete comments

### Language support
* English
* Russian

### Supported versions
Please check: https://www.php.net/supported-versions.php
* PHP 8.0
* PHP 8.1
* PHP 8.2

### Installation
```bash
composer require dimsog/wn-comments-plugin
```

### How to use
```html
title = "Demonstration"
url = "/post/:slug"
layout = "default"

[comments]
==

{% component 'comments' %}

```

### Count the total number of comments from current page
```html
Count: <span id="comments-count">{{ comments.count() }}</span>
```

### Count the total number of comments from another page
```html
Count: <span id="comments-count">{{ comments.count('/') }}</span>
```


### Configuration
![image](https://user-images.githubusercontent.com/904958/147883069-479315ab-6c16-4298-ba9c-2a821f96b910.png)

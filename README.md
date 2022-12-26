Add comments to any page on your site.
![image](https://user-images.githubusercontent.com/904958/209522089-da572948-8d5f-4e01-ab7d-604691f9a85d.png)
![image](https://user-images.githubusercontent.com/904958/209521953-3ae2ab52-b63d-4d80-b33d-7a0a63bf61ed.png)

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

### Show comments for specific page
```html
title = "Demonstration"
url = "/post/:slug"
layout = "default"

[comments]
url = "{{ :slug }}"

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

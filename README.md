Add comments to any page on your site.
![image](https://user-images.githubusercontent.com/904958/147882849-1608a077-07a9-4849-9fdc-8617c0952fe8.png)

### Features
* Absolutely free (MIT)
* Moderation
* Show/hide the email field
* Support for tree comments
* The ability to delete comments

### Language support
* English
* Russian

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

### Configuration
![image](https://user-images.githubusercontent.com/904958/147883069-479315ab-6c16-4298-ba9c-2a821f96b910.png)

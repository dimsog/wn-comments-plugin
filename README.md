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

### Count the total number of comments from current page
```html
Count: <span id="comments-count">{{ comments.countActiveCommentsFromCurrentPage() }}</span>
or
Count: <span id="comments-count">{{ comments.count() }}</span>
```

### Count the total number of comments from another page
```html
Count: <span id="comments-count">{{ comments.countActiveCommentsByUrl('/') }}</span>
or
Count: <span id="comments-count">{{ comments.count('/') }}</span>
```


### Configuration
![image](https://user-images.githubusercontent.com/904958/147883069-479315ab-6c16-4298-ba9c-2a821f96b910.png)

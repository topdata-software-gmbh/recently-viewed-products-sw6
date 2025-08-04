---
title: FAQ (Frequently Asked Questions)
---

**Q: The recently viewed products slider is not appearing on any page. Why?**

A: There are a few possible reasons:
1.  The customer has not viewed any products yet. The slider only appears after at least one product has been visited.
2.  The product currently being viewed is excluded from the slider on the product detail page to avoid duplication.
3.  The feature may be disabled in the plugin configuration. Check that **Show on product detail page** or **Automatically show on every CMS Page** is enabled.
4.  The products that were viewed are no longer active or are not visible in the current Sales Channel. The plugin automatically filters out unavailable products.

**Q: How does the plugin track products for customers who are not logged in?**

A: For guest users, the recently viewed products are associated with the current session token (`sw-context-token`). This means the history is maintained as they browse the site.

**Q: What happens to a guest's viewing history when they log in?**

A: When a guest with a viewing history logs in, their session token is updated to their customer account token. The plugin ensures that the product history is carried over seamlessly, so they do not lose their list of recently viewed items.

**Q: Can I have different slider styles on different pages?**

A: Yes. The settings in the plugin configuration are only defaults. When you use the **Recently Viewed Product Slider** block in the Shopping Experiences editor, you can override every visual setting (like title, display mode, border, etc.) for that specific slider, giving you full control over its appearance on a per-page basis.

**Q: Will this plugin slow down my site?**

A: The plugin is designed with performance in mind. The slider content is loaded via an asynchronous AJAX request after the main page has loaded. This ensures that it does not block the page from rendering and is compatible with Shopware's full-page caching mechanisms.

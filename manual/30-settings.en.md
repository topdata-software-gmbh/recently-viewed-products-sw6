--- 
title: Configuration
---

To configure the plugin, navigate to **Extensions > My extensions**, find the "Todpdata Recently viewed products" plugin in the list, and click on the "..." button to select **Configuration**.

The settings are divided into two main sections:

### 1. Recently Viewed Product Configuration

This section controls the core behavior of the tracking functionality.

*   **Maximum Items:**
    *   **Description:** The maximum number of recently viewed products to store for each customer. If a customer views more products than this limit, the oldest entry will be removed.
    *   **Default:** 10

*   **Show on product detail page:**
    *   **Description:** If enabled, a recently viewed products slider will automatically be displayed at the bottom of every product detail page. The slider will not appear if the customer has no viewing history.
    *   **Default:** Enabled

*   **Automatically show on every CMS Page:**
    *   **Description:** If enabled, a slider will automatically be added to the bottom of all CMS pages (e.g., landing pages, category pages). This does not apply to the product detail page, which is controlled by the setting above.
    *   **Default:** Disabled

*   **Show the recent products in random order:**
    *   **Description:** If enabled, the products in the slider will be displayed in a random order. If disabled, they will be displayed in reverse chronological order (most recently viewed first).
    *   **Default:** Disabled

### 2. Default Element Configuration

This section defines the default appearance and behavior for all automatically displayed sliders (on product detail pages or other CMS pages). These settings also serve as the initial values when you add a new "Recently Viewed Product Slider" element in the Shopping Experiences.

*   **Slider title:** The default heading displayed above the slider.
*   **Display Mode:** The layout style for the product boxes inside the slider (`Standard`, `Cover`, or `Contain`).
*   **Vertical align:** The vertical alignment of the slider content (`Top`, `Center`, or `Bottom`).
*   **Navigation:** If enabled, shows next/previous arrows for the slider.
*   **Automatic sliding:** If enabled, the slider will automatically scroll through the products.
*   **Border:** If enabled, adds a border around the slider.
*   **Minimal width (px only):** The minimum width for each product box in pixels (e.g., `250px`). This influences how many products are visible at once.
*   **Show product price:** If enabled, the product price will be displayed in the product box.
*   **Show box actions:** If enabled, the "Add to cart" button (or similar actions) will be shown in the product box.
*   **Show product ratings:** If enabled, the product's average star rating will be shown.

# Recently Viewed Product Slider for Shopware 6

A plugin for [Shopware 6](https://github.com/shopware/platform) that displays a slider of products a customer has recently viewed. This helps increase customer engagement and conversion by reminding them of their interests.

For detailed instructions on installation, configuration, and usage, please refer to the [user manual](./manual/).

## Features

- **Shopping Experiences Integration**: Adds a "Recently Viewed Product Slider" block and element to the Shopping Experiences, allowing you to place the slider on any CMS page.
- **Full Customization**: The slider element is highly customizable, with options for title, display mode, navigation, automatic sliding, borders, and more, similar to the standard product slider.
- **Automatic Display**: The slider can be configured to automatically appear on:
    - The bottom of every product detail page.
    - The bottom of all other CMS pages.
- **Centralized Configuration**:
    - Set global defaults for all slider settings (e.g., title, display mode, number of items).
    - Configure the maximum number of products to track.
    - Choose to display products in chronological or random order.
- **Smart Tracking**: Tracks recently viewed products for both logged-in customers and guest users. The history is automatically merged when a guest logs in.
- **AJAX Loading**: Slider content is loaded asynchronously to ensure compatibility with full-page caching and improve performance.


-## Demo:

![](https://media.giphy.com/media/VInadwfREBVz8QfIAI/giphy.gif)

![](https://user-images.githubusercontent.com/22548423/93246997-d00fe580-f7b7-11ea-925b-18ee10dca0ee.png)

![](https://user-images.githubusercontent.com/22548423/93250564-321f1980-f7bd-11ea-9147-ff1e46b30e29.png)

![](https://user-images.githubusercontent.com/22548423/93248266-d4d59900-f7b9-11ea-9251-e6b160f24154.png)


## TODO
- Recent products are shared between customer's devices.

## Requirements

| Shopware Version | Plugin Version | Status       |
|------------------|----------------|--------------|
| >= 6.7.0.0       | 2.x.x          | Compatible   |
| < 6.7.0.0        | 2.x.x          | Incompatible |

## License

Plugin's Icon by [flaticon](https://www.flaticon.com).

The plugin is released under the MIT License. For a full overview, check the [LICENSE](./LICENSE) file.

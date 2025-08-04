Of course. Here is the final, validated implementation plan in a clean markdown format.

---

## **Final Plan: Upgrading "Recently Viewed Products" to Shopware 6.7**

This plan outlines the necessary steps to upgrade the "Recently Viewed Products" plugin for full compatibility with Shopware 6.7. It is structured into distinct phases to ensure a smooth and thorough migration.

### **Phase 0: Preparation and Environment Setup**

The goal of this phase is to prepare the development environment and project structure for a successful upgrade.

1.  **Version Control:**
    *   Create a new branch in your Git repository dedicated to this upgrade (e.g., `feature/sw-6.7-upgrade`).

2.  **Environment Setup:**
    *   Set up a new, clean Shopware 6.7.x instance for development. Ensure it meets the new system requirements (PHP 8.2+, Node.js 20+).
    *   Install the plugin into this new instance.

3.  **Update Dependencies:**
    *   Modify `composer.json` to require the new Shopware version and update the plugin's version number.
      ```json
      {
        "name": "topdata/recently-viewed-products-sw6",
        "description": "Recently viewed products plugin",
        "type": "shopware-platform-plugin",
        "version": "5.0.0",
        "license": "MIT",
        "authors": [
            {
                "name": "Thuong Le",
                "email": "levienthuong@gmail.com"
            }
        ],
        "autoload": {
            "psr-4": {
                "TopdataRecentlyViewedProductsSW6\\": "src/"
            }
        },
        "require": {
            "shopware/core": "^6.7.0.0",
            "shopware/storefront": "^6.7.0.0"
        },
        "extra": {
          "shopware-plugin-class": "TopdataRecentlyViewedProductsSW6\\TopdataRecentlyViewedProductsSW6",
          "plugin-icon": "src/Resources/config/plugin.png",
          "copyright": "(c) by Thuong Le<levienthuong@gmail.com>",
          "label": {
            "de-DE": "Kürzlich angesehene Produkte für SW6",
            "en-GB": "Recently viewed products for SW6"
          },
          "description": {
            "de-DE": "Kunden kürzlich angesehene Produkte anzeigen",
            "en-GB": "Show customer recently viewed products"
          }
        },
          "conflict": {
              "shopware/storefront": "<6,>=8",
              "shopware/administration": "<6,>=8"
          },
          "prefer-stable": true
      }
      ```
    *   Run `composer update` to download the new dependencies.

### **Phase 1: Backend & Core Logic Upgrade (PHP)**

This phase focuses on making the PHP codebase compatible with Shopware 6.7's core changes.

1.  **Add Native PHP Types:**
    *   Go through all PHP classes and add native types to all class properties, as this is now enforced.
    *   **Affected Files:**
        *   `src/Core/System/SalesChannel/Context/SalesChannelContextPersisterDecorated.php`
        *   `src/Service/RecentlyViewedProductService.php`
        *   `src/Subscriber/Storefront/CmsPageLoaderSubscriber.php`
        *   `src/Subscriber/Storefront/ProductPageLoaderSubscriber.php`
    *   **Example (`RecentlyViewedProductService.php`):**
        ```php
        // Before
        private $rpvRepository;
        // After
        private readonly EntityRepository $rpvRepository;
        ```

2.  **Update Service Definitions:**
    *   **File:** `src/Resources/config/services.xml`
    *   **Action:** Remove the `<call method="setTwig">` line from the `Topdata\TopdataRecentlyViewedProductsSW6\Controller\RecentProductController` service definition, as this method has been removed from the base `StorefrontController`.

3.  **Validate Decorator:**
    *   Carefully check the constructor signature of the original `Shopware\Core\System\SalesChannel\Context\SalesChannelContextPersister` in Shopware 6.7.
    *   Ensure the constructor of your decorator in `SalesChannelContextPersisterDecorated.php` remains compatible.

### **Phase 2: Administration UI Overhaul**

This is the most significant phase due to the migration to Vite, Vue 3, and the Meteor Component Library.

1.  **Automated Component Migration:**
    *   From the Shopware root directory, run the official codemod tool to automate the replacement of deprecated `sw-` components.
      ```bash
      composer run admin:code-mods -- --plugin-name TopdataRecentlyViewedProductsSW6 --fix -v 6.7
      ```

2.  **Manual UI Adjustments & Review:**
    *   **Review Code:** The codemod will leave `// TODO` comments where it could not perform a clean migration. Manually review every changed file.
    *   **Component Logic:** Pay close attention to `<sw-select-field>` which is now `<mt-select>`. You must convert the old `<option>` tags into an `options` array prop.
    *   **Iconography:** Check all `<mt-icon>` components. The icon names have changed. You must find the new names in the Meteor Iconography documentation (e.g., `default-arrow-head-left` might become `regular-arrow-head-left`).
    *   **Async Components:** In `src/Resources/app/administration/src/module/sw-cms/elements/recently-viewed-product-slider/component/index.js`, the `mountedComponent` method accesses `this.$refs`. This is now a race condition. Wrap the logic in `this.$nextTick` to ensure the element is available.
      ```javascript
      // Before
      mountedComponent() {
          this.setSliderRowLimit();
      },

      // After
      async mountedComponent() {
          await this.$nextTick(); // Wait for the DOM to update
          this.setSliderRowLimit();
      },
      ```

3.  **Build Administration Assets:**
    *   From the Shopware root directory, run the new build script. This will compile your plugin's admin assets using Vite.
      ```bash
      bin/build-administration.sh
      ```

### **Phase 3: Storefront Adjustments**

These changes ensure the storefront functionality remains intact.

1.  **Build System:**
    *   The storefront build process has also been updated. Run the build script to ensure all assets compile correctly.
      ```bash
      bin/build-storefront.sh
      ```

2.  **Template Verification (ESI Caching):**
    *   The plugin injects the slider into the main page content (`page_product_detail_inner`) and head, not the header or footer blocks. This should not be affected by the new ESI caching.
    *   **Action:** No code changes are expected here, but this must be a key area for testing.

### **Phase 4: Testing & Quality Assurance**

This phase is critical to verify all changes and ensure the plugin is stable.

1.  **Backend Testing:**
    *   Verify that viewing products correctly populates the `recently_viewed_product` database table for both anonymous and logged-in users.

2.  **Administration Testing:**
    *   Open Shopping Experiences and add the "Recently viewed products slider" block.
    *   Confirm the element configuration sidebar opens without console errors.
    *   Test every configuration option (title, display mode, switches, etc.).
    *   Save the layout and confirm the configuration persists and the CMS preview updates.

3.  **Storefront Testing:**
    *   Clear all caches.
    *   Visit several products to build a viewing history.
    *   Navigate to a product detail page and confirm the slider appears correctly and excludes the current product.
    *   Visit a CMS page that uses the element and confirm the slider renders correctly.
    *   Verify the slider is fully functional (arrows work, products are linked correctly).
    *   Confirm the slider does **not** render if there is no product history.
    *   Test the "Automatically show on every CMS Page" and "Show on product detail page" configuration settings.

### **Phase 5: Documentation and Release**

Finalize the plugin for a new major release.

1.  **Update `CHANGELOG_de-DE.md` and `CHANGELOG_en-GB.md`:**
    *   Add an entry for the new major version (e.g., `5.0.0`).
    *   Clearly state that this version is **only compatible with Shopware 6.7.0.0 and newer**.
    *   Mention the major breaking changes addressed.

2.  **Update `README.md`:**
    *   Update the "Requirements" table to show compatibility with Shopware 6.7.

3.  **Tag and Release:**
    *   Commit all changes to your Git repository.
    *   Create a new version tag (e.g., `v5.0.0`).
    *   Prepare and upload the new version to the Shopware Store.


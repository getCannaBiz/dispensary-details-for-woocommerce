# Dispensary Details for WooCommerce®

**Dispensary Details for WooCommerce®** is a free, open-source plugin that enhances WooCommerce with cannabis-specific product details and dispensary-related features. Originally developed in 2018 and previously sold as a premium plugin, it is now available for free to support the cannabis industry with open-source solutions.

---

## 🎯 Features

### 🏪 **Product Enhancements**
This plugin adds additional product details tailored for dispensaries and cannabis retailers. Each product type includes relevant metadata:

- **Flower**: THC, CBD, THCA, CBN, CBG, CBA
- **Edibles**: THC/CBD per serving, servings, net weight (g)
- **Tinctures**: THC mg per serving, CBD mg per serving, ml per serving, servings, net weight (oz)
- **Topicals**: THC mg, CBD mg, size (oz)
- **Growers**: Origin, grow time, yield, seeds per unit, clones per unit

### 📂 **Custom Taxonomies**
Organize your products with industry-relevant categories:
- **Aromas**
- **Flavors**
- **Effects**
- **Symptoms**
- **Conditions**
- **Ingredients**
- **Shelf Type**
- **Strain Type**
- **Vendors**

### ⚙️ **Custom WooCommerce Settings**
The plugin includes dispensary-specific settings in the WooCommerce admin panel:

- **Minimum Order Amount** – Set a minimum cart value before checkout is allowed.
- **Delivery Service** – Enable or disable delivery as an option.
- **Cart Redirect** – Select a page to redirect users if the cart is empty.
- **Checkout Redirect** – Select a page to redirect users before checkout.
- **Auto-Complete Orders** – Automatically change order status from "processing" to "completed."
- **Doctor Recommendation** – Adds verification fields to user registration and profiles.
- **Require Recommendation** – Restricts checkout unless recommendation documents are uploaded.

---

## 📥 Installation

### 🛠 **Manual Installation**
1. [Download the latest release](https://github.com/getCannaBiz/dispensary-details-for-woocommerce/releases).
2. Upload the plugin folder to `/wp-content/plugins/` in your WordPress directory.
3. Activate the plugin in **Plugins → Installed Plugins**.

---

## ⚡ **Usage**
### 1️⃣ **Adding Cannabis-Specific Product Details**
- Edit any WooCommerce product.
- Under **Product Data**, enter the relevant compound details (THC, CBD, etc.).
- Save the product.

### 2️⃣ **Configuring WooCommerce Dispensary Settings**
- Go to **WooCommerce → Settings → Dispensary Details**.
- Configure options like **Minimum Order**, **Auto-Complete Orders**, and **Doctor Recommendation**.
- Save changes.

### 3️⃣ **Using Custom Taxonomies**
- Navigate to **Products → [Your Taxonomy]** (e.g., Strain Type, Effects).
- Add new terms for classification.
- Assign these terms when editing products.

---

## 🎨 Customization

If you need to modify the plugin for your dispensary’s unique needs, you can:
- **Override Templates**: Copy template files to your theme and customize them.
- **Use Hooks & Filters**: Modify output via WordPress action hooks and filters.
- **Extend the Plugin**: Add custom fields or modify existing ones.

---

## 👥 Contribution

### 💡 **How to Contribute**
We welcome contributions! Here's how you can help:
1. **Report Issues** – Found a bug? Open an [issue](#).
2. **Submit a Pull Request** – Fork the repo, make your changes, and submit a PR.
3. **Suggest Features** – Have ideas? Let's discuss.

### 🏗 **Development Setup**
1. Clone the repo:  
    ```bash
    git clone https://github.com/yourusername/dispensary-details-for-woocommerce.git
    ```
2. Navigate to the plugin directory:
    ```
    cd dispensary-details-for-woocommerce
    ```
3. Start developing!
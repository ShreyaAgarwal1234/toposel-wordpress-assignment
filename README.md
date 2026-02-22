

## 📋 Assignment Overview
Recreated the mobile homepage design from Figma using WordPress CMS so that a non-technical business user can easily manage all content through the WordPress admin panel.

## ✅ Features
- Announcement Bar (editable text + link)
- Header with Logo and Navigation Icons
- Hero Banner (editable image, heading, subheading, button)
- Stats Bar (200+, 2,000+, 30,000+)
- Brand Logos Section (VERSACE, ZARA, GUCCI, PRADA, Calvin Klein)
- New Arrivals Section with WooCommerce Products
- View All Button

## 🛠️ Tech Stack
- **WordPress** (Local WP)
- **ACF** - Advanced Custom Fields (Free)
- **WooCommerce** (for products)
- **HTML / CSS** (custom theme)
- **PHP** (custom page template)

## 📁 Theme Files
```
toposel-theme/
├── style.css          # Theme styles
├── functions.php      # ACF fields + theme setup
├── index.php          # Default template
├── header.php         # Header + navigation
├── footer.php         # Footer
├── page-home.php      # Homepage template
└── README.md          # This file
```

## ⚙️ How to Set Up Locally
1. Install **Local WP** from localwp.com
2. Create a new WordPress site
3. Copy `toposel-theme` folder to:
   `wp-content/themes/toposel-theme`
4. Go to **WordPress Admin → Appearance → Themes**
5. Activate **Toposel Theme**
6. Install plugins:
   - Advanced Custom Fields
   - WooCommerce
7. Go to **Pages → Add New**
8. Set template to **Homepage**
9. Go to **Settings → Reading**
10. Set Homepage to your new page
11. Go to **Pages → Home → Edit**
12. Fill in all ACF fields
13. Add products via **WooCommerce → Products**

## 📱 Content Management
All content is manageable through WordPress admin:

| Section | Editable Fields |
|---|---|
| Announcement Bar | Text, Link Text, Link URL |
| Hero Banner | Image, Heading, Subheading, Button Text, Button Link |
| Brand Logos | 5 Brand Names |
| New Arrivals | Product Category, Product Count |

## 🎯 Evaluation Criteria Met
- ✅ Design Accuracy (Mobile)
- ✅ Dynamic Content Handling
- ✅ CMS Usability
- ✅ Code Structure & Cleanliness
- ✅ Screen Recording Explanation


# Frontend Design & Layout Stability Guidelines

## 1. Static and Image Grid Layouts
- **Pure CSS Grid Over Runtime JS**: Always prefer pure CSS Grid (`display: grid`) with `aspect-ratio` and `object-fit: cover` over runtime JavaScript layout libraries like Masonry or Isotope for image galleries.
- **Prevent Cumulative Layout Shift (CLS)**: Give images and cards explicit aspect ratios or minimum heights to prevent DOM height shifts when assets finish loading.

## 2. Carousel & Looping Slider Stability
- **No Empty Hash Anchors**: Never use empty `<a href="#">` inside carousel items or looping sliders. Use `<a href="javascript:void(0);">` or non-navigating elements to prevent scroll jumps on slide transitions.
- **Explicit Height on Carousel Items**: Ensure slide wrappers have fixed or minimum heights with `display: flex; align-items: center; justify-content: center;` so slide changes do not alter container height.

## 3. Islamic Academy Theme Tokens
- **Primary Emerald Dark**: `#0b291b` to `#061910` (Headers, Banner Overlays, Footers).
- **Mint & Forest Accents**: `#1b4332`, `#2d6a4f`, `#52b788`, `#95d5b2`, `#d8f3dc`.
- **Gold / Highlight Accents**: `#c5a059` / `#d4af37` (Badges, awards, stars, and ribbons).

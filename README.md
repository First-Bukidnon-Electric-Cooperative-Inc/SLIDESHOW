# 📽️ PHP Slideshow for OBS

A lightweight PHP-powered fullscreen image slideshow designed for use with [OBS Studio](https://obsproject.com/) as a browser source. This solution automatically cycles through images in a specified folder and updates the list dynamically.

---

## 🔧 Features

- Fullscreen image slideshow (ideal for OBS browser source)
- Randomized image order on each refresh
- Crossfade effect with CSS transitions
- Automatically detects new or removed images every 10 seconds
- Simple setup with pure HTML, JS, and PHP (no dependencies)

---

## 📁 Project Structure
```
slideshow/
├── images/ # Folder containing your images (JPG, PNG, GIF)
├── index.html # Main frontend for slideshow display
├── image-list.php # Backend script that returns image URLs as JSON
```

---

## 🚀 Getting Started

### 1. Setup Your Web Server

Ensure you're running a PHP-capable web server (e.g., Apache, Nginx with PHP-FPM, or XAMPP for local testing).

> You **must** place the project in a directory accessible by your web server.

### 2. Add Your Images

Place all your `.jpg`, `.jpeg`, `.png`, or `.gif` files into the `images/` folder.

### 3. Launch the Slideshow

Open `index.html` in a browser — or even better, **add it as a Browser Source in OBS**:

#### OBS Setup Instructions:

1. Open OBS Studio.
2. Add a new **Browser Source**.
3. Set the URL to your local or hosted path (e.g., `http://localhost/slideshow/index.html`).
4. Set width and height to match your OBS canvas (e.g., `1920x1080`).
5. Uncheck **"Shutdown source when not visible"** if you want the slideshow to continue running in the background.
6. Done!

---

## 🔄 Behavior

| Action                    | Frequency     |
|--------------------------|---------------|
| Refresh image list       | Every 10 sec  |
| Change image (crossfade) | Every 5 sec   |

Images are shuffled on every image list refresh.

---

## 🔐 CORS

The script includes CORS headers (`Access-Control-Allow-Origin: *`) to ensure it works seamlessly in OBS and browser environments.

---

## 🛠️ Customization

### Change slideshow interval:

Modify this line in `index.html`:

```js
setInterval(rotateImages, 5000); // 5000 ms = 5 seconds
setInterval(fetchImageList, 10000); // 10000 ms = 10 seconds
```

💡 Tips
OBS lagging or showing black screen?
Make sure the image formats are supported, and the paths are accessible.
Use object-fit: contain in CSS to avoid image cropping.

Running locally?
Use XAMPP, WAMP, MAMP, or another PHP server. Browsers won’t run PHP scripts directly from file://.

📜 License
MIT License — use freely, modify openly.

You can now copy and paste this into a `README.md` file in your project folder. Let me know if you'd like a ZIP-ready project structure or GitHub-ready formatting.


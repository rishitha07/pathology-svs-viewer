# 🧪 Pathology SVS Viewer

A web-based digital pathology slide viewer built with Docker, PHP, OpenSeadragon, and Cantaloupe (OpenSlide backend).

---

## 🔍 Features

- Upload `.svs` pathology slide files
- View high-resolution slides with zoom and pan
- Dockerized setup with PHP + Apache + MySQL + Cantaloupe
- Clean UI with file dropdown and thumbnail preview

---

## 📋 Table of Contents

- [Getting Started](#-getting-started)
- [Usage](#-usage)
- [Folder Structure](#-folder-structure)
- [Screenshots](#-screenshots)
- [License](#-license)

---

## 🚀 Getting Started

### ✅ Prerequisites

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

### ▶️ Run Locally

```bash
git clone https://github.com/rishitha07/pathology-svs-viewer.git
cd pathology-svs-viewer
docker-compose up --build
```

This will start the following containers:

📦 Apache + PHP frontend (http://localhost:8080)

🧠 Cantaloupe IIIF image server (http://localhost:8182)

🛢️ MySQL database (localhost:3306) (optional, used for logging uploads)

## 📂 Usage
🔼 Uploading Slides
Upload .svs files using the form on viewer.html

Files are stored in the uploads/ directory and served via Cantaloupe

🔎 View Slides
UI Viewer:
Open http://localhost:8080/viewer.html

Direct IIIF URL (for testing):

http://localhost:8182/iiif/2/CMU-1-Small-Region.svs/full/full/0/default.jpg

## 📁 Folder Structure

pathology-svs-viewer/
├── apache-php/
│   ├── viewer.html        # Main UI
│   ├── upload.php         # File upload handler
│   ├── list_files.php     # List uploaded files
├── uploads/               # SVS file mount directory
├── Dockerfile.cantaloupe  # Custom Dockerfile with OpenSlide
├── docker-compose.yml
├── cantaloupe.properties
└── README.md

## 📸 Screenshots

### Slide Viewer UI
![Viewer Screenshot](screenshots/viewer.png)




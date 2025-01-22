# Vue3 and Laravel 11 with Docker (In process 22-01-2024)
## Descripción
Project designed to work in Docker's container. It's a form of a basic register-loggin
## Prerequisites
Before you start, make sure you have the following installed:
- [Docker](https://www.docker.com/) (Version 20.10 or later)
- (Optional) A text editor like [VS Code](https://code.visualstudio.com/) for exploring the project files.

---
## Getting Started
### Clone the repository
```bash
git clone https://github.com/Darional/Technical-Test.git
```

### Build and Run the Docker Image
Follow these steps to build and run the project:
1. Build the Docker image
```bash
docker build frontend-vue3 .
```
2. Run the Docker container at the port 8080
```bash
docker run -p 8080:8080 frontend-vue3
```
3. Access to the Application
```bash
http://localhost:8080
```
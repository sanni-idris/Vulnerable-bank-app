# Vulnerable Bank App

This is a deliberately insecure banking web application built for educational and ethical hacking practice. It includes:

## Vulnerabilities & Highlights

### SQL Injection (SQLi)

- Allows attackers to inject malicious SQL code via input fields, bypassing authentication or extracting data.

### Cross-Site Scripting (XSS)

- Vulnerable pages allow attackers to inject malicious JavaScript that runs in victims' browsers.

### Insecure File Upload

- Allows uploading of files without proper validation, which can lead to remote code execution or defacement.

### Cross-Site Request Forgery (CSRF)

- Affected File: `change-email.php`  
- Exploit Example: `csrf-attack.html` forces authenticated users to unknowingly submit requests.

### Server-Side Request Forgery (SSRF)

- Vulnerable Page: `ssrf.php`  
- Allows fetching of arbitrary URLs without validation, potentially exposing internal systems.

### Broken Access Control

- Affected Endpoint: `edit-profile.php?id=USER_ID`  
- Allows unauthorized access or modification of other users’ data.

### Insecure Logging

- `logger.php` logs events to a flat file without sanitization, potentially exposing sensitive information.

🔒 Intended for use in controlled lab environments only.

---

## Running the App with Docker

To simplify setup and avoid environment issues, this project now supports running inside Docker containers.

### Prerequisites

- Docker installed on your machine  
- Docker Compose (usually bundled with Docker Desktop)

### How to Run

Clone the repo, then from the project root directory run:

```bash
docker-compose up --build

This will:

Build the PHP + Apache Docker image

Launch the app accessible at http://localhost:8080 (default port mapping)

Login Credentials
Use the following dummy login to access the app dashboard:

Username: admin

Password: admin123

Vulnerabilities Included
1. SQL Injection (SQLi)
Classic SQL injection vulnerability to practice input sanitization bypass.

2. Cross-Site Scripting (XSS)
Stored and reflected XSS vulnerabilities present in various input fields.

3. Insecure File Upload
Allows uploading files without proper validation leading to potential code execution.

4. Cross-Site Request Forgery (CSRF)
Affected File: change-email.php
Forces an authenticated user to unknowingly submit a request to change their email address.

Exploit Example:

<form action="http://localhost/vulbapp/change-email.php" method="POST">
  <input type="hidden" name="email" value="attacker@example.com">
</form>
<script>document.forms[0].submit();</script>

5. Server-Side Request Forgery (SSRF)
Vulnerable Page: ssrf.php
Accepts URLs without validation, allowing internal and external resource fetching.

Proof of Concept:

Accessing http://localhost/vulbapp/ssrf.php?url=http://example.com fetches external content.

6. Broken Access Control (BAC)
Vulnerable Endpoint: edit-profile.php?id=USER_ID
Improper authorization allows accessing/modifying other users' profiles by changing URL parameters.

Basic Logging Utility - logger.php
This file contains a log_event() function that logs events to a flat file (logs/event_log.txt). Used throughout the app to simulate insecure logging.

Creates /logs directory if missing

Appends timestamped events to the log file

Usage Example
Include in any PHP script:
include 'logger.php';
log_event("User logged in: admin");

Updates & Fixes
Added Docker support (Dockerfile + docker-compose.yml) for easy deployment

Implemented a simple login system with session management (login.php and index.php)

Fixed file permission issues on /logs and /uploads directories

Cleaned up header and redirection errors in login scripts

Author
Sanni Babatunde Idris (@sanni-idris)

⚠️ WARNING: Use only in safe, controlled environments for educational purposes. Do NOT deploy in production.





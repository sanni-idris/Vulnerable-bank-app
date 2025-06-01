# Vulnerable Bank App

This is a deliberately insecure banking web application built for educational and ethical hacking practice. It includes:

- ✅ SQL Injection (SQLi)
- ✅ Cross-Site Scripting (XSS)
- ✅ Insecure File Upload

🔒 Intended for use in controlled lab environments only.

---

## Tools Used
- Apache2 – Web server
- PHP – Backend scripting
- MySQL – Database (for injection testing)
- BackBox Linux – Testing environment

### 5. Cross-Site Request Forgery (CSRF)

- **Vulnerability Type**: CSRF (Cross-Site Request Forgery)
- **Affected File**: `change-email.php`
- **Attack Vector**: Forces an authenticated user to unknowingly submit a request to change their email address.
- **Exploit File**: `csrf-attack.html`

#### 🔥 Example Exploit:
```html
<form action="http://localhost/vulbapp/change-email.php" method="POST">
  <input type="hidden" name="email" value="attacker@example.com">
</form>
<script>document.forms[0].submit();</script>

---




   ### 🛰️ Server-Side Request Forgery (SSRF)


**Vulnerability Summary**:  
A basic SSRF vulnerability was implemented in the application to simulate insecure server-side fetching of external resources. The `ssrf.php` page accepts a URL as input without validation and passes it directly to `file_get_contents()`, allowing crafted requests to internal or external systems.

**Proof of Concept**:  
Accessing:
http://localhost/vulbapp/ssrf.php?url=http://example.com

will retrieve and display content from the given URL.

**Security Risk**:  
An attacker could use this flaw to access internal services, metadata endpoints (e.g., AWS `169.254.169.254`), or scan internal networks.

**Remediation**:  
- Validate and whitelist URLs or hostnames.
- Avoid server-side URL fetching from user input unless absolutely necessary.
- Use SSRF-aware libraries and network segmentation.




 
### Broken Access Control (BAC) Vulnerability

**Description:**  
The application improperly restricts access to user-specific resources, allowing attackers to access or modify data belonging to other users by manipulating URL parameters.

**Vulnerable Endpoint:**  
`edit-profile.php?id=USER_ID`

**How to Test:**  
Change the `id` parameter in the URL to another user’s ID (e.g., from `1` to `2`). The page will load the profile of the user corresponding to the supplied ID without proper authorization checks.

**Impact:**  
An attacker can view or potentially modify other users' sensitive information, leading to data leakage and privilege escalation.

**Mitigation:**  
Implement proper authorization checks to ensure that users can only access or modify their own data based on session information, not user-supplied input.

## 🪵 logger.php – Basic Logging Utility

This file contains a `log_event()` function used to log custom events or messages to a flat file (`logs/event_log.txt`). It's used across various components in the app to simulate insecure logging practices.

### 📂 Path
`app/logger.php`

### 🔍 What It Does

- Creates the `/logs` directory if it doesn't exist
- Logs messages with a timestamp
- Appends logs to `logs/event_log.txt`

### 🔧 Usage Example

In any PHP file (e.g., `login.php` or `sqli.php`), include and use like this:

```php
include 'logger.php';
log_event("Login attempt for user: admin");



## Author
Sanni Babatunde Idris(@sanni-idris)


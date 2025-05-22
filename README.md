## Features

- **User Management**
  - Full CRUD operations for users via API.
  - Input validation with detailed JSON error messages (422 Unprocessable Entity).
  - Unique email validation.
  - Secure password hashing.

- **Request Validation**
  - Custom FormRequest classes to validate API inputs.
  - Automatic JSON response on validation failure.

- **Rate Limiting**
  - IP-based rate limiting (e.g., 5 requests per minute).
  - Custom localized JSON error messages on limit exceed.
  - Implemented using Laravel's RateLimiter service.

- **API Resource Routing**
  - RESTful routes using Laravel’s API Resource.
  - Versioned API endpoint grouping (`api/v1/users`).

- **Caching**
  - Caching implemented in repository layer for better performance.
  - File-based caching (configurable).
  - Prevents caching empty or null results.

- **Error Handling**
  - Global HTTP exception handler with JSON formatted errors.
  - Handles 429 Too Many Requests with custom JSON response.
  - Consistent API error structure.

- **Clean Architecture**
  - Separation of concerns with Controllers, Services, and Repositories.
  - Easy to maintain and extend.

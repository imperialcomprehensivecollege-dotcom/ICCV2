## API Reference

### Authentication

All API endpoints require authentication (Bearer token or session).

```bash
curl -H "Authorization: Bearer {token}" https://api.primaryschool.local/api/posts
```

### Endpoints

#### Posts

```
GET    /api/posts              # List all posts
GET    /api/posts/{id}         # Get single post
POST   /api/posts              # Create post
PUT    /api/posts/{id}         # Update post
DELETE /api/posts/{id}         # Delete post
```

#### Pages

```
GET    /api/pages              # List all pages
GET    /api/pages/{slug}       # Get page by slug
```

#### Galleries

```
GET    /api/galleries          # List galleries
GET    /api/galleries/{slug}   # Get gallery
```

#### Admissions

```
GET    /api/admissions         # List applications
POST   /api/admissions         # Submit application
GET    /api/admissions/{id}    # Get application
```

### Response Format

Success Response:
```json
{
    "success": true,
    "data": { /* model data */ },
    "message": "Operation successful"
}
```

Error Response:
```json
{
    "success": false,
    "error": "Error message",
    "code": 400
}
```

### Examples

#### Get Posts
```bash
GET /api/posts?page=1&per_page=12
```

Response:
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "title": "Post Title",
            "slug": "post-slug",
            "content": "...",
            "published_at": "2024-01-01T00:00:00Z"
        }
    ],
    "meta": {
        "total": 100,
        "per_page": 12,
        "page": 1
    }
}
```

#### Create Admission
```bash
POST /api/admissions
Content-Type: application/json

{
    "student_name": "John Doe",
    "email": "john@example.com",
    "phone": "+1234567890",
    "date_of_birth": "2015-01-01",
    "grade_applying": "Grade 1",
    "parent_name": "Jane Doe",
    "parent_email": "jane@example.com",
    "parent_phone": "+1234567890"
}
```

### Rate Limiting

Default rate limits:
- 60 requests per minute for authenticated users
- 10 requests per minute for unauthenticated users

### Pagination

Use `page` and `per_page` parameters:
```
GET /api/posts?page=2&per_page=20
```

### Filtering

Most endpoints support filtering:
```
GET /api/posts?category=news&status=published
```

### Sorting

Use `sort_by` and `sort_order` parameters:
```
GET /api/posts?sort_by=published_at&sort_order=desc
```

### Field Selection

Select specific fields:
```
GET /api/posts?fields=id,title,published_at
```

### Errors

Common error codes:
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Validation Error
- `429` - Too Many Requests
- `500` - Server Error

Validation Error Response:
```json
{
    "success": false,
    "code": 422,
    "errors": {
        "email": ["Email is required"],
        "phone": ["Phone must be valid"]
    }
}
```

### Webhooks

Subscribe to events:
```
POST /api/webhooks
{
    "url": "https://your-app.com/webhook",
    "events": ["post.published", "admission.submitted"]
}
```

### Version

Current API version: v1

Access versioned endpoints:
```
GET /api/v1/posts
```

For more details, refer to the API documentation or contact support.

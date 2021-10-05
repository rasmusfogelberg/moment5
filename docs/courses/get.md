# Show Courses

[Go back](../../README.md)

Show all available courses.

**URL** : `/api/read.php`

**Method** : `GET`

**Data constraints** : `{}`

## Success Responses

**Code** : `200 OK`

```json
[
  {
    "id": 123,
    "code": "WD001",
    "name": "Web Development I",
    "progression": "A",
    "course_syllabus": "http://test.com/path/to/syllabus"
  }
]
```

## Error Responses

**Condition** : If there no Courses exist the server.

**Code** : `404 NOT FOUND`

**Content example**

```json
{
  "message": "There are no courses"
}
```

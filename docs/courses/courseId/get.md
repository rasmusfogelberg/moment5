# Show course

[Go back](../../../README.md)

Show all available courses.

**URL** : `/api/read.php?id=:courseId`

**URL Parameters** : courseId=[integer] where courseId is the ID of the course on the server.

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

**Condition** : If Course does not exist.

**Code** : `404 NOT FOUND`

**Content example**

```json
{
  "message": "There are no courses"
}
```

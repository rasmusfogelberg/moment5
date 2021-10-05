# Update Course

[Go back](../../README.md)

Update a Course.

**URL** : `/api/update.php`

**Method** : `PUT`

**Data constraints**

Provide all required fields of the Course to be updated.

```json
{
  "id": [string | integer],
  "code": [string],
  "name": [string],
  "progression": [string],
  "course_syllabus": [string]
}
```

**Data example** All fields must be sent.

```json
{
  "id": 123,
  "code": "WD001",
  "name": "Web Development I",
  "progression": "A",
  "course_syllabus": "http://test.com/path/to/syllabus"
}
```

## Success Response

**Condition** : If all fields are provided.

**Code** : `200 OK`

**Content example**

```json
{
  "message": "Course was updated successfully."
}
```

## Error Responses

**Condition** : If fields are missing.

**Code** : `400 BAD REQUEST`

**Content example**

```json
{
  "message": "Must fill out all fields."
}
```

# Create Course

[Go back](../../README.md)

Create a Course.

**URL** : `/api/create.php`

**Method** : `POST`

**Data constraints**

Provide all required fields of the Course to be created.

```json
{
  "code": "",
  "name": "",
  "progression": "",
  "course_syllabus": ""
}
```

**Data example** All fields must be sent.

```json
{
  "code": "",
  "name": "",
  "progression": "",
  "course_syllabus": ""
}
```

## Success Response

**Condition** : If all fields are provided.

**Code** : `200 SUCCESS`
**Content example**

```json
{
  "message": "Course successfully created"
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

## Or

**Condition** : If Course could not be created

**Code** : `400 BAD REQUEST`

**Content example**

```json
{
  "message": "Could not process request."
}
```

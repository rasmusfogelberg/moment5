# Delete Course

[Go back](../../README.md)

Delete a Course.

**URL** : `/api/delete.php`

**Method** : `DELETE`

**Data constraints**

Provide required id field of the Course to be deleted.

```json
{
  "id": [integer]
}
```

**Data example** All fields must be sent.

```json
{
  "id": "1"
}
```

## Success Response

**Condition** : If all fields are provided.

**Code** : `200 SUCCESS`

**Content example**

```json
{
  "message": "Course was deleted successfully"
}
```

## Error Responses

**Condition** : If id field is missing.

**Code** : `400 BAD REQUEST`

**Content example**

```json
{
  "message": "Id field is missing in request body"
}
```

## OR

**Condition**: If there was no Course to delete

**Code**: `404 NOT FOUND`

**Content example**

```json
{
  "message": "What did you try to delete? There is nothing there."
}
```

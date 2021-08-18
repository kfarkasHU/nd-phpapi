# Registering a new path

## Methods

## Segments
A route can contain more than one segment. A segment is surrounded by `/`. The lib will split the entered string by the slashes, and will try to compare the request path with the registered paths. If it finds a matching path (with matching `REQUEST_METHOD` too), then it will resolve the class (controller), and will call the registered method with the existing arguments.

### Parameters
You can add arguments to a path, by indicating it with leading colons (`:`).

#### Optional parameters
Every parameter can be optional, if you mark it as a parameter (`:`). If the lib find the leading colons, it will ignore the value.
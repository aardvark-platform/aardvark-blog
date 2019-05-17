---
Title: Filled Polygons
Description: Filled polygons for 3d lasso selection
Author: Andreas Walch
Date: 2019-05-15
Robots: noindex,nofollow
Template: blog-post
---
# Filled Polygons for 3d lasso selection

To integrate the well known 2D lasso selection into a 3D application is not trivial.
The lasso forming points must not share the same 2D plane.
Elevations or lowering within the lasso's area deny simple 2D shape renderings, because they may only be partly colored. ![Image of 2D-shape intersection](%base_url%/images/FilledPolygon/2DShape.png) To efficiently color the inside of the lasso a clipping volume has to be derived from the lasso points. Based on Shadow Volume Technique the clipping volume is used to generate a stencil mask to draw the lasso inside.

The clipping volume can be formed in various ways, but mainly the lasso points are duplicated and shifted to put up a volume. 

# Plane Fitted

The simplest approach extrude a clipping volume by shifting all points along the same vector (the duplicated points into the inverse direction). A simple shift vector can be derived by using the regression plane's normal of the lasso points. To ensure that all elevations and lowering are included the shift offset has to be chosen accordingly. This approach is prone to lasso point's distributions within 3D space and can lead to undesirable coloring. ![Image of clipping volume by regression plane](%base_url%/images/FilledPolygon/regression_fail.png)

## Axis-Single Point

More advanced shift vector need additional information about the 3D data. In case of caves or tunnel alike scenarios a path or axis contributes useful informations. For all lasso points the closest point on the path is evaluated. The average point on the path can be used like a projection centre. All lasso points are shifted along their projection vector. This method allows to create areas spanning over both sides of a tunnel. Projection artefacts can occur by sparsely sampling the lasso areas. ![Image of clipping volume by single point](%base_url%/images/FilledPolygon/singlePoint_fail.png)

## Axis-Mulitple Points

todo

## Axis-Mulitple Points Subdivided

todo

## Demo-Video

The video demonstrates the various techniques. [embed "https://youtu.be/6k_IL5xXeOg"].
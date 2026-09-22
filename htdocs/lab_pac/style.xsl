<?xml version='1.0'?> <!--   <?xml-stylesheet type="text/xsl" href="style.xsl"?>   -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version='1.0'>
<xsl:template match='/'>
<html>
<head>
<title>ajsdf</title>
<style>
tr,td,th{
    border:2px solid black;
}
</style>
</head>
<body>
<table>
<tr>
    <th>system number</th>
    <th>Username</th>
</tr>
<xsl:for-each select="lab/system">
<tr>
    <td><xsl:value-of select="no" /> </td>
    <td><xsl:value-of select="username" /></td>
</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
    

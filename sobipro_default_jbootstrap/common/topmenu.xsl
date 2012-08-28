<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:php="http://php.net/xsl">
    <xsl:output method="xml" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" encoding="UTF-8"/>
    <xsl:template match="menu">
        
        <div class="row-fluid">
            <div class="span12">
        
                <div class="subnav">
                    <ul class="nav nav-pills">
                        <li>
                            <a>
                                <xsl:attribute name="href">
                                    <xsl:value-of select="front/@url" />
                                </xsl:attribute>
                                <xsl:value-of select="front" />
                            </a>
                        </li>
                        <li>
                            <a>
                                <xsl:attribute name="href">
                                    <xsl:value-of select="search/@url" />
                                </xsl:attribute>
                                <xsl:value-of select="search" />
                            </a>
                        </li>
                        <li>
                            <a>
                                <xsl:attribute name="href">
                                    <xsl:value-of select="add/@url" />
                                </xsl:attribute>
                                <xsl:value-of select="add" />
                            </a>                    
                        </li>
                    </ul>
                </div>
        
            </div>
        </div>
  

    </xsl:template>
</xsl:stylesheet>

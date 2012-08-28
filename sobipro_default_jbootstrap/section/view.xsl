<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:php="http://php.net/xsl">
    <xsl:output method="xml" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" encoding="UTF-8"/>

    <xsl:include href="../common/topmenu.xsl" />
    <xsl:include href="../common/alphamenu.xsl" />
    <xsl:include href="../common/category.xsl" />
    <xsl:include href="../common/entries.xsl" />
    <xsl:include href="../common/navigation.xsl" />

    <xsl:variable name="subcatsNumber">
        <xsl:value-of select="/section/number_of_subcats" />
    </xsl:variable>

    <xsl:template match="/section">
        <xsl:variable name="rssUrl">{"sid":"
            <xsl:value-of select="id"/>","sptpl":"feeds.rss","out":"raw"}
        </xsl:variable>
        <xsl:variable name="sectionName">
            <xsl:value-of select="name"/>
        </xsl:variable>
        <xsl:value-of select="php:function( 'SobiPro::AlternateLink', $rssUrl, 'application/atom+xml', $sectionName )" />
        <div class="SPListing">
            <xsl:apply-templates select="menu" />
            <xsl:apply-templates select="alphaMenu" />
            
            <div class="row-fluid">
                <div class="span12">
                    <xsl:value-of select="description" disable-output-escaping="yes" />
                </div>
            </div>
            
            <xsl:variable name="catsInLine">
                <xsl:value-of select="categories_in_line" />
            </xsl:variable>
            <xsl:variable name="spanWidth">
                <xsl:value-of select="(12 div $catsInLine)" />
            </xsl:variable>
            
            <div class="row-fluid">
                <xsl:for-each select="categories/category">
                
                    <div class="span{$spanWidth}">
                        <xsl:call-template name="category" />
                    </div>

                    <xsl:choose>
                        <xsl:when test="(position()+1) mod $catsInLine">
                            <xsl:text disable-output-escaping="yes">
&lt;/div&gt;&lt;div class='row-fluid'&gt;
                            </xsl:text> 

                        </xsl:when>
                        <xsl:otherwise>     
                        </xsl:otherwise>
                    </xsl:choose>                                                                            
                    
                </xsl:for-each>                
            </div>
            
            <xsl:call-template name="entriesLoop" />
            <xsl:apply-templates select="navigation" />
        </div>
    </xsl:template>
</xsl:stylesheet>

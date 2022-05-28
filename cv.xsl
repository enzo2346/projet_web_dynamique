<?xml version="1.0" encoding="iso-8859-1"?>
  <xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
    <html><head><style type="text/css">*{
  margin: 0;
  box-sizing: border-box;
}

body{
  font-family: Roboto;
  font-weight: 300;
  font-size: .9rem;
  line-height: 1.5;
}

a{
  text-decoration: none;
  color: #4472C4;
}

a:hover{
  text-decoration: underline;
}

p{
  margin: 0 0 1rem;
}

h1{
  margin: 0 0 1rem;
  font-size: 2.5rem;
  margin-bottom: .5rem;
}

h2{
  margin: 0 0 1rem;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.text-blue{
  color: #4472C4;
}

.text-darkblue{
  color: #002060;
}

.text-uppercase{
  text-transform: uppercase; 
}

.icon{
  margin-right: .5rem;
}

.cv-container{
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-areas: "left-column right-column right-column";
  width: 1200px;
  margin: 100px auto;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.section{
  margin-bottom: 1.5rem;
}

/* LEFT COLUMN */
.left-column{
  grid-area: left-column;
  padding: 50px;
  background-color: #4472C4;
  color: white;
}

.portait{
  border-radius: 50%;
  max-width: 150px;
  margin: auto;
  display: block;
  margin-bottom: 50px;
}

.skills{
  list-style-type: none;
  padding: 0;
  font-size: 1.1rem;
  letter-spacing: 1px;
  margin: 0 0 1rem;
}

/* RIGHT COLUMN */
.right-column{
  grid-area: right-column;
  display: grid;
  grid-template-rows: 250px 1fr;
  grid-template-areas: 
    "header"
    "content";
}

/* HEADER */
.header{
  grid-area: header;
  padding: 50px;
  background-color: #F2F2F2;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.infos{
  columns: 2;
  list-style-type: none;
  padding: 0;
}

/* CONTENT */
.content{
  grid-area: content;
  padding: 50px;
}

.experience-list{
  list-style-type: circle;
}</style></head>
<body>
    <div class="cv-container">
      <div class="left-column">
        <img class="portait" src="{cv/identite/photo}" />
        <div class="section">
          <h2>COMPETENCES</h2>
          <ul class="skills">
            <xsl:apply-templates select="cv/competences/competence"/>
          </ul>
        </div>
      </div>
      <div class="right-column">
        <div class="header">
          <h1><xsl:value-of select="cv/identite/nom"/><span class="text-blue text-uppercase"><xsl:value-of select="cv/identite/prenom"/></span></h1>
          <ul class="infos">
            <li><i class="icon fas fa-at text-blue"></i> <a href="mailto:{cv/mail}"><xsl:value-of select="cv/mail"/></a></li>
            <li><i class="icon fas fa-phone text-blue"></i><xsl:value-of select="cv/telephone"/></li>
          </ul>
        </div>
        <div class="content">
          <div class="section">
            <h2>Experiences  <span class="text-blue">professionelles</span></h2>
            <ul class="experience-list">
              <xsl:apply-templates select="cv/experiences/experience"/>
            </ul>
          </div>
          <div class="section">
            <h2>Etudes  <span class="text-blue">formations</span></h2>
            <ul class="experience-list">
              <xsl:apply-templates select="cv/formations/formation"/>
            </ul>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
</xsl:template>

 <xsl:template match="formation">
      <li><xsl:value-of select="." /></li>
    </xsl:template>

<xsl:template match="experience">
      <li><xsl:value-of select="." /></li>
    </xsl:template>

 <xsl:template match="competence">
      <li><xsl:value-of select="." /></li>
    </xsl:template>
</xsl:stylesheet>
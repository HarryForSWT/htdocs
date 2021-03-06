<?xml version="1.0"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
 <html>
   <head>
     <meta charset="utf-8"/>
     <title></title>
     <link rel="stylesheet" href="/WME_Aufgabe2_Le/resetstyle.css"/>
     <link rel="stylesheet" href="/WME_Aufgabe2_Le/style.css"/>
     <script src="https://kit.fontawesome.com/070f0bbc07.js" crossorigin="anonymous"></script>
     <script src="/WME_Aufgabe2_Le/script.js"></script>
   </head>
   <body>
     <header>
       <nav>
         <a class="navbar-items logo" href="#" onclick="makeGrey()"><img src="/WME_Aufgabe2_Le/world_data-logo.svg" id="logo" ></img></a>
         <ul>
           <li><a class="navbar-items item" href="/WME_Aufgabe2_Le/"><i class="fas fa-list-ul"></i> A1 - Table</a></li>
           <li><a class="navbar-items item" href="/WME_Aufgabe2_Le/parse.php"><i class="fas fa-list-ul"></i> A2 - Parse</a></li>
           <li><a class="navbar-items item" href="/WME_Aufgabe2_Le/save.php"><i class="fas fa-list-ul"></i> A2 - Save</a></li>
           <li><a class="navbar-items item" href="/WME_Aufgabe2_Le/print.php"><i class="fas fa-list-ul"></i> A2 - Print</a></li>
           <li><a class="navbar-items item" href="#"><i class="fas fa-list-ul"></i> A3 - Rest</a></li>
           <li><a class="navbar-items item" href="#"><i class="fas fa-list-ul"></i> A4 - Vis</a></li>
           <li><a class="navbar-items item" href="#"><i class="fas fa-list-ul"></i> A5 - 3D</a></li>
         </ul>
       </nav>
     </header>
     <main>
       <h1>World Data Overview ...</h1>
       <section>
         <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

         Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

         Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

         Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer <a href="www.loremipsum.de" style="color: #49c932">www.loremipsum.de</a></p>
       </section>

       <div id="show_and_hide_bar">
         Show/Hide:
         <a href="#/" class="show_and_hide_bar " id="birth_rate_per_1000">birth rate per 1000</a>
         <a href="#/" class="show_and_hide_bar" id="cell_phones_per_100">cell phones per 100</a>
         <a href="#/" class="show_and_hide_bar" id="children_per_woman">children per woman</a>
         <a href="#/" class="show_and_hide_bar" id="electricity_consumption_per_capita">electricity consumption per capita</a>
         <a href="#/" class="show_and_hide_bar" id="gdp_per_capita">gdp per capita</a>
       </div>
       <table id="table">
         <thead id="thead"></thead>
         <tbody>
           <xsl:for-each select="Countries/Country">
           <tr>
             <td><xsl:value-of select="id"/></td>
             <td><xsl:value-of select="name"/></td>
             <td><xsl:value-of select="birth"/></td>
             <td><xsl:value-of select="cell"/></td>
             <td><xsl:value-of select="children"/></td>
             <td><xsl:value-of select="electricity"/></td>
             <td><xsl:value-of select="gdp_per_capita"/></td>
           </tr>
           </xsl:for-each>
         </tbody>
       </table>
     </main>
     <footer>
       <span id="name">Kevin Van Le</span>
     </footer>
   </body>

   </html>
</xsl:template>

</xsl:stylesheet>

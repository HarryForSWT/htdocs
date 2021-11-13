<?xml version="1.0"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html> 
            <head>
                <meta charset="UTF-8">
                <title>World Data</title>
                <link rel="stylesheet" href="reset.css">
                <link href="style.css" type="text/css" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">   
                <script src="https://kit.fontawesome.com/e62912c20d.js" crossorigin="anonymous"></script>
                <script src="https://kit.fontawesome.com/070f0bbc07.js" crossorigin="anonymous"></script>
                <script src="script.js"></script>
            </head>
            <body>
                <header>
                    <nav class="container clearfix" role="navigation">
                        <a class="logo" href="#">world_data</a>
                        <ul id="main_nav">
                            <li><a id="part_nav" href="#"><i class="fas fa-table"></i> A1 - Table</a></li>
                            <li><a id="part_nav" href="/WME_Aufgabe2_Zhao/parse.php"><i class="fas fa-cogs"></i> A2 - Parse</a></li>
                            <li><a id="part_nav" href="/WME_Aufgabe2_Zhao/save.php"><i class="far fa-save"></i> A2 - Save</a></li>
                            <li><a id="part_nav" href="/WME_Aufgabe2_Zhao/print.php"><i class="fas fa-print"></i> A2 - Print</a></li>
                            <li><a id="part_nav" href="#"><i class="fab fa-node"></i> A3 - REST</a></li>
                            <li><a id="part_nav" href="#"><i class="fas fa-map-marked-alt"></i> A4 - Vis</a></li>
                            <li><a id="part_nav" href="#"><i class="fas fa-cube"></i> A5 - 3D</a></li>            
                        </ul>
                        
                    </nav>
                </header>
                <main>
                    <h1>World Data Overview ...</h1>
                    <section>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        from <a href="#/" >www.loremipsum.de</a></p>
                    </section>


                    <table id="show_and_hide_bar">
                    <thead id="thead-fake">
                    <tr>
                    <th id="showhide">Show/Hide: </th>
                    <th>
                    <a href="#/" class="show_and_hide_bar " id="birth_rate_per_1000">birth rate</a> |
                    <a href="#/" class="show_and_hide_bar" id="cell_phones_per_100">cell phones</a> |
                    <a href="#/" class="show_and_hide_bar" id="children_per_woman">children / woman</a> |
                    <a href="#/" class="show_and_hide_bar" id="electricity_consumption_per_capita">electric usage</a> |
                    <a href="#/" class="show_and_hide_bar" id="gdp_per_capita">internet usage</a>
                    </th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                    

                    <table class="table">
                        <thead id="thead"></thead>
                        <tbody id="tbody">
                            <xsl:for-each select="Countries/Country">
                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><xsl:value-of select="name"/></td>
                            <td><xsl:value-of select="birth"/></td>
                            <td><xsl:value-of select="cell"/></td>
                            <td><xsl:value-of select="children"/></td>
                            <td><xsl:value-of select="electric"/></td>
                            <td><xsl:value-of select="gdp_per_capita"/></td>
                        </tr>
                        </xsl:for-each>
                        </tbody>
                    </table>

                </main>

                <footer>
                    <div class="container">
                        <div class="left">
                            <p>
                                Copyright &copy; 2021 world_data<br>
                                First course exercise <strong>HTML, CSS and JS</strong> of the lecture Web and Multimedia Engineering.
                            </p>
                        </div>
                        <div class="right">
                            <p>
                                This solution has been created by:<br>
                                Yiming Zhao(4905112)
                            </p>
                        </div>
                    </div>
                </footer>
                

                
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
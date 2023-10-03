# DAILY PROGRESS INSTEAD OF PERFECTION
1. MVC Model
C'est un *Design Patterns* divisant la construction d'une full stack web app en 3 composants:  

      a. Des Models: Qui sont chargés de la communication(connection, CRUD operation, et fermeture pour eviter des failles) et de la gestion des databases.   
          
      b. Des Views: Qui representent le final UIqui sera presnter au users, cela englobe la partie frontend et le design d'interface.   

      c. Des controllers qui sont chargés de la communication entre les deux premieres parties
    
    Il est preferable que chaque table ait un .php file pour gerer le database dans le model folder, ainsi pour chaque model nous aons un .php file et au centre de cela on aura un *db.php* file qui vas gerer la connection et qui sera inclut dans les autres fichiers de db

2. La Sanitanization, un facteur de sécurité tres important   
Cela passe par l'utilisation des fonctions appropriées afin de valider l'input des utilisateur avant toute sauvergarde dans la database. Ceci permet un meilleur controle des donnés et réduit la probabilité des attaques d'injection (SQL et autre)

3. Error Handleling : Un attout majeure de toute application
Une application doit etre capable de pouvoir s'en sortir dans nombre de cas en evitant autant que possible de cracher ou de s'arreter soudainement à cause d'une erreur que le dev n'as pas ou a négliger.


# How to make the live server extension work?

* First activate by clickin on the golive icon inside vscode 
* Then open up the php server(right click and then serve project)
* After that you can close these 2 server and open the one for xampp(copy its address, and paste it on ur browser inside the live server extension form as server address)

### Un sass file débutant avec un underscore(_) est un *partial*, but no need to use _ when importing them

[x] Une bonne pratique apres avoir enlever le outline d'un element est de preciser son comportement au hover et au focus
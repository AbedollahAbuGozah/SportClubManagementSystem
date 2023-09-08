# SportClubManagementSystem
Web application about manage matches between players,
And the user can be player or trainer so the trainer
can add and delete player and add and delete match,
And the player just can see info about his upcoming matches,
And each user can edit his profile page
## Database
The database is created using MySQL database
#### Tables
* Matche: has three columns (id, date, Trainer_id)
* User: has four columns(id, first_name, last_name, role)
* Player-match(intermediate table): has two columns(player_id, match_id)
#### Relations
* Player-Match: Many-to-Many relation so each player belongs to many matches and each match has many players(two players)
* Trainer-match:One-to-Many each trainer belongs to many matches and each match has one trainer
### Skills
* HTML
* Tailwind 
* PHP Laravel
* MySQL

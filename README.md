# TerritoryTitans

## Overview
TerritoryTitans is a team-based strategy game where players compete to claim and control territory on a grid. The game is persistent, meaning players can log out and return to a continuously evolving game state influenced by the actions of other players.

## Game Mechanics

### Player Start
- **First Login**: New players are placed on a random cell upon their first login.
- **Player Icon**: Each player's location is marked by a purple image, which can be customized with an icon-sized image for better aesthetics.

### Cell Ownership
- **Background Colors**:
  - Blue: Unoccupied (initial state of all cells)
  - Other Colors: Indicate ownership by different teams
- **Ownership Persistence**: Once a cell is claimed, it remains owned by that team until overtaken by another team.

### Movement
- **Cell Navigation**: Players move by clicking on a desired cell.
- **Movement Response**: Implemented using Ajax for instantaneous updates.
- **Backend Update**: Movement triggers backend updates to reflect changes in territory ownership.

### Territory Claiming Rules
- A team claims a cell if it has more ships on that cell than any other team.
- In case of a tie, the team with the latest arrival time wins ownership.
  
  **Examples**:
  - 3 yellow ships vs 1 red ship: Yellow team owns the cell.
  - 1 red ship: Red team owns the cell.
  - 2 red ships vs 2 blue ships: The team with the latest arrival owns the cell.
  
- If a player moves from a cell they alone occupied, their team retains control until another team's ship arrives.

## User Interface

### Panels
- **Details Panel**: Displays game details and player statistics.
- **Chat Panel**: Allows players to communicate with each other.

### Cell Tooltips
- Hovering over a cell shows a tooltip with the names of players on that cell.

## Admin Functionality
- **Admin App**: Resets all cells to unoccupied for testing purposes. No login or password management required.

## Technologies Used
- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
import gui
import random
import copy
from copy import deepcopy
"""
2048 Game
Please read the comments to help clear up any confusion about what the purpose of the various variables are
"""

"---------------------------------"
# Give grid the appropriate value
grid = [[0,0,0,0],
        [0,0,0,0],
        [0,0,0,0],
        [0,0,0,0]]
"---------------------------------"


# Values to represent the directions the tiles could move
UP = 1
DOWN = 2
RIGHT = 3
LEFT = 4

# Dictionary that might be useful
helper = {"count": 0, "Right": RIGHT, "Up": UP, "Left": LEFT, "Down": DOWN}

# Used to store the available keyboard controls
controls = ["<Right>", "<Left>", "<Up>", "<Down>"]

# used to help animate the movement from one tile to another, if s are implemented correctly increasing
# this will increase the speed at which the tiles move and decreasing it will also cause the tiles to move slower
transition_value = 20

" "
def empty_slots():
    return [(row,column) for row in range(len(grid)) for column in range(len(grid[row])) if grid[row][column] == 0]

" "
def random_position():
    return random.choice(empty_slots())
    
" "
def add_random_number(board):
    value = helper['count']
    string = 'Tile number ' + str(value) 
    temp = gui.random_number()
    temp1 = random_position()
    x = temp1[0]
    y = temp1[1]
    gui.put(board,string,temp,x,y)
    grid[x][y] = temp.value
    helper['count'] += 1
    return (x,y)

" "
def find_identifier(board,row,column):
    for x in board.numbers:
        if board.numbers[x] == (row,column):
            return x
        
" "
def update_grid(row,column,direction):
    tuple = ()

    for x in helper:
        if helper[x] == direction:
            direct = helper[x]   
    
    if (1 == direct and row != 0) and (grid[row-1][column] == 0 or grid[row][column] == grid[row-1][column]):
        if grid[row][column] == grid[row-1][column]:
            grid[row-1][column] += grid[row][column]
            grid[row][column] = 0
        else:
            grid[row-1][column] = grid[row][column]
            grid[row][column] = 0
        tuple = tuple + (row-1,column)
        return tuple

    if (2 == direct and row != 3) and (grid[row+1][column] == 0 or grid[row][column] == grid[row+1][column]):
        if grid[row][column] == grid[row+1][column]:
            grid[row+1][column] += grid[row][column]
            grid[row][column] = 0
        else:
            grid[row+1][column] = grid[row][column]
            grid[row][column] = 0
        tuple = tuple + (row+1,column)
        return tuple

    if (3 == direct and column != 3) and (grid[row][column+1] == 0 or grid[row][column] == grid[row][column+1]):
        if grid[row][column] == grid[row][column+1]:
            grid[row][column+1] += grid[row][column]
            grid[row][column] = 0 
        else:
            grid[row][column+1] = grid[row][column]
            grid[row][column] = 0
        tuple = tuple + (row,column+1)
        return tuple
    
    if (4 == direct and column != 0) and (grid[row][column-1] == 0 or grid[row][column] == grid[row][column-1]):
        if grid[row][column] == grid[row][column-1]:
            grid[row][column-1] += grid[row][column]
            grid[row][column] = 0
        else:
            grid[row][column-1] = grid[row][column]
            grid[row][column] = 0
        tuple = tuple + (row,column-1)
        return tuple    
    
    tuple = (row,column)
    return tuple

" "
def animate_movement(board,mkey,full_hd,full_vd,direction):
    if direction == 1:
        vertical_distance = transition_value * -1
        horizontal_distance = transition_value * 0
        if full_vd < transition_value:
            gui.move_tile(board,mkey,horizontal_distance,(-1*full_vd))
            if merge(board,mkey) == True:  
               return False
            return True
        else:
            gui.move_tile(board,mkey,horizontal_distance,vertical_distance)
            return animate_movement(board,mkey,full_hd,full_vd-transition_value,direction)
   
    if direction == 2:
        vertical_distance = transition_value * 1
        horizontal_distance = transition_value * 0
        if full_vd < transition_value:
            gui.move_tile(board,mkey,horizontal_distance,full_vd)
            if merge(board,mkey) == True:
               return False
            return True
        else:
            gui.move_tile(board,mkey,horizontal_distance,vertical_distance)
            return animate_movement(board,mkey,full_hd,full_vd-transition_value,direction)

    if direction == 3:
        vertical_distance = transition_value * 0
        horizontal_distance = transition_value * 1
        if full_vd < transition_value:
            gui.move_tile(board,mkey,full_hd,vertical_distance)
            if merge(board,mkey) == True:
               return False
            return True
        else:
            gui.move_tile(board,mkey,horizontal_distance,vertical_distance)
            return animate_movement(board,mkey,full_hd-transition_value,full_vd,transition_value,direction)

    if direction == 4:
        vertical_distance = transition_value * 0
        horizontal_distance = transition_value * -1
        if full_vd < transition_value:
            gui.move_tile(board,mkey,(-1*full_hd),vertical_distance)
            if merge(board,mkey) == True:
               return False
            return True
        else:
            gui.move_tile(board,mkey,horizontal_distance,vertical_distance)
            return animate_movement(board,mkey,full_hd-transition_value,full_vd,direction)
        
" "
def move(board,mkey,direction):
    if direction == 1:
        direct = 1
        if gui.move_number(board,mkey,direct,update_grid,animate_movement) == True:
            move(board,mkey,direction)
    if direction == 2:
        direct = 2
        if gui.move_number(board,mkey,direct,update_grid,animate_movement) == True:
            move(board,mkey,direction)
    if direction == 3:
        direct = 3
        if gui.move_number(board,mkey,direct,update_grid,animate_movement) == True:
            move(board,mkey,direction)
    if direction == 4:
        direct = 4
        if gui.move_number(board,mkey,direct,update_grid,animate_movement) == True:
            move(board,mkey,direction)
            
" "
def move_all_down(board):
    for x in range(len(grid)):
        y = -1
        for z in range(len(grid[y])):
            if grid[y][x] != 0:
                i = find_identifier(board,(y+4),x)
                move(board,i,DOWN)
            y = y-1
            
" "
def move_all_up(board):
    for x in range(len(grid)):
        y = 0
        for a in range(len(grid[y])):
            if grid[y][x] != 0:
                i = find_identifier(board,y,(x))
                move(board,i,UP)
            y = y+1
            
" "
def move_all_right(board):
    for x in range(len(grid)):
        y = -1
        for a in range(len(grid[x])):
            if grid[x][y] != 0:
                i = find_identifier(board,x,(y+4))
                move(board,i,RIGHT)
            y = y -1
            
" "
def move_all_left(board):
    for x in range(len(grid)):
        y = 0
        for a in range(len(grid[x])):
            if grid[x][y] != 0:
                i = find_identifier(board,x,(y))
                move(board,i,LEFT)
            y = y + 1
            
" "        
def move_all(board,event):
    if helper[event] == UP:
        move_all_up(board)
    if helper[event] == DOWN:
        move_all_down(board)
    if helper[event] == RIGHT:
        move_all_right(board)      
    if helper[event] == LEFT:
        move_all_left(board)
   
" "
def keyboard_callback(board,event,frame):
    a = deepcopy(grid)
    unbind(frame)
    move_all(board,event)
    if is_game_over(board) == True:
        if max(max(grid)) >= 2048:
            gui.game_over(board,True)
        else:
            gui.game_over(board,False)
    else:
        bind(frame,board)
        if a != grid:
            add_random_number(board)
            
" "
def bind(frame,board):
    for c in range(len(controls)):
        frame.bind(controls[c],lambda event: keyboard_callback(board,event.keysym,frame))
        
" "        
def unbind(frame):
    for c in range(len(controls)):
        frame.unbind(controls[c])

" "    
def merge(board,mkey):
    row,coloumn = gui.find_position(board,mkey)
    for x in board.numbers:
        mkey1 = x
        if mkey1 != mkey:
            x_pos,y_pos = gui.find_position(board,mkey1)
            if (x_pos == row) and (y_pos == coloumn):
                board.numbers.pop(mkey)
                gui.remove_number(board,mkey1)
                gui.remove_number(board,mkey)
                val_u = grid[x_pos][y_pos]
                y_value = gui.find_number(val_u)
                board.score += y_value.value
                gui.update_score(board)
                gui.put(board,mkey1,y_value,x_pos,y_pos)
                return True
    return False

" "
def is_game_over(board):
    size = len(grid) -1
    positive = True
    for x_pos in range(len(grid)):
        for y_pos in range(len(grid[x_pos])):
            val_u = grid[x_pos][y_pos]
            if (val_u == 0):
                positive = False
            if (x_pos > 0) and (grid[x_pos-1][y_pos] == val_u):
                positive = False
            if (y_pos > 0) and (grid[x_pos][y_pos-1] == val_u):
                positive = False
            if (x_pos < size) and (grid[x_pos+1][y_pos] == val_u):
                positive = False
            if (y_pos < size) and (grid[x_pos][y_pos+1] == val_u):
                positive = False
    return positive 

" "
if __name__ == '__main__':
    """Your Program will start here"""           
    frame, board = gui.setup()
    
    #Finishing setting up your Gameboard here, answer to Question 17 should go here
    row,coloumn = add_random_number(board)
    row,coloumn = add_random_number(board)
    mkey = find_identifier(board,row,coloumn)

    bind(frame,board)
    gui.start(frame)




    

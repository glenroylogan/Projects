import gui
import random
import copy
from copy import deepcopy
"""
2048 Game
Please read the comments to help clear up any confusion about what the purpose of the various variables are

Before submitting ensure to edit this comment block to include the ID numbers of both group members
GroupMember:
GroupMemeber:
"""

# Give grid the appropriate value
grid = [[0,0,0,0],
        [0,0,0,0],
        [0,0,0,0],
        [0,0,0,0]]


# Values to represent the directions the tiles could move
UP = 1
DOWN = 2
RIGHT = 3
LEFT = 4

# Dictionary that might be useful
helper = {"count": 0, "Right": RIGHT, "Up": UP, "Left": LEFT, "Down": DOWN}

# Used to store the available keyboard controls
controls = ["<Right>", "<Left>", "<Up>", "<Down>"]

# used to help animate the movement from one tile to another, if functions are implemented correctly increasing
# this will increase the speed at which the tiles move and decreasing it will also cause the tiles to move slower
transition_value = 20

def empty_slots():
    return [(x,y) for x in range(len(grid)) for y in range(len(grid[x])) if grid[x][y] == 0]

def random_position():
    return random.choice(empty_slots())

def add_random_number(board):
    val = helper['count']
    string = 'Tile number ' + str(val) 
    temp = gui.random_number()
    temp1 = random_position()
    x = temp1[0]
    y = temp1[1]
    gui.put(board,string,temp,x,y)
    grid[x][y] = temp.value
    helper['count'] += 1
    return (x,y)

def find_identifier(board,x,y):
    for k in board.numbers:
        if board.numbers[k] == (x,y):
            return k

def update_grid(x,y,direction):
    tup1 = ()

    for key in helper:
        if helper[key] == direction:
            direct = helper[key]
    
    if (4 == direct and y != 0) and (grid[x][y-1] == 0 or grid[x][y] == grid[x][y-1]):
        if grid[x][y] == grid[x][y-1]:
            grid[x][y-1] += grid[x][y]
            grid[x][y] = 0
        else:
            grid[x][y-1] = grid[x][y]
            grid[x][y] = 0
        tup1 = tup1 + (x,y-1)
        return tup1

    if (3 == direct and y != 3) and (grid[x][y+1] == 0 or grid[x][y] == grid[x][y+1]):
        if grid[x][y] == grid[x][y+1]:
            grid[x][y+1] += grid[x][y]
            grid[x][y] = 0 
        else:
            grid[x][y+1] = grid[x][y]
            grid[x][y] = 0
        tup1 = tup1 + (x,y+1)
        return tup1

    if (1 == direct and x != 0) and (grid[x-1][y] == 0 or grid[x][y] == grid[x-1][y]):
        if grid[x][y] == grid[x-1][y]:
            grid[x-1][y] += grid[x][y]
            grid[x][y] = 0
        else:
            grid[x-1][y] = grid[x][y]
            grid[x][y] = 0
        tup1 = tup1 + (x-1,y)
        return tup1

    if (2 == direct and x != 3) and (grid[x+1][y] == 0 or grid[x][y] == grid[x+1][y]):
        if grid[x][y] == grid[x+1][y]:
            grid[x+1][y] += grid[x][y]
            grid[x][y] = 0
        else:
            grid[x+1][y] = grid[x][y]
            grid[x][y] = 0
        tup1 = tup1 + (x+1,y)
        return tup1
    
    tup1 = (x,y)
    return tup1

def animate_movement(board,mkey,t_hd,t_vd,direction):
    if direction == 1:
        vd = transition_value * -1
        hd = transition_value * 0
        if t_vd < transition_value:
            gui.move_tile(board,mkey,hd,(-1*t_vd))
            if merge(board,mkey) == True:
               return False
            return True
        else:
            gui.move_tile(board,mkey,hd,vd)
            return animate_movement(board,mkey,t_hd,t_vd-transition_value,direction)
   
    if direction == 2:
        vd = transition_value * 1
        hd = transition_value * 0
        if t_vd < transition_value:
            gui.move_tile(board,mkey,hd,t_vd)
            if merge(board,mkey) == True:
               return False
            return True
        else:
            gui.move_tile(board,mkey,hd,vd)
            return animate_movement(board,mkey,t_hd,t_vd-transition_value,direction)

    if direction == 3:
        vd = transition_value * 0
        hd = transition_value * 1
        if t_vd < transition_value:
            gui.move_tile(board,mkey,t_hd,vd)
            if merge(board,mkey) == True:
               return False
            return True
        else:
            gui.move_tile(board,mkey,hd,vd)
            return animate_movement(board,mkey,t_hd-transition_value,t_vd_value,direction)

    if direction == 4:
        vd = transition_value * 0
        hd = transition_value * -1
        if t_vd < transition_value:
            gui.move_tile(board,mkey,(-1*t_hd),vd)
            if merge(board,mkey) == True:
               return False
            return True
        else:
            gui.move_tile(board,mkey,hd,vd)
            return animate_movement(board,mkey,t_hd-transition_value,t_vd,direction)

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

def move_all_up(board):
    for t in range(len(grid)):
        x = 0
        for z in range(len(grid[x])):
            if grid[x][t] != 0:
                k = find_identifier(board,x,(t))
                move(board,k,UP)
            x += 1

def move_all_right(board):
    for x in range(len(grid)):
        y = -1
        for z in range(len(grid[x])):
            if grid[x][y] != 0:
                k = find_identifier(board,x,(y+4))
                move(board,k,RIGHT)
            y += -1

def move_all_down(board):
    for t in range(len(grid)):
        x = -1
        for z in range(len(grid[x])):
            if grid[x][t] != 0:
                k = find_identifier(board,(x+4),t)
                move(board,k,DOWN)
            x += -1

def move_all_left(board):
    for x in range(len(grid)):
        y = 0
        for z in range(len(grid[x])):
            if grid[x][y] != 0:
                k = find_identifier(board,x,(y))
                move(board,k,LEFT)
            y += 1
        
def move_all(board,event):
    if helper[event] == DOWN:
        move_all_down(board)
    if helper[event] == UP:
        move_all_up(board)
    if helper[event] == LEFT:
        move_all_left(board)
    if helper[event] == RIGHT:
        move_all_right(board)

def keyboard_callback(board,event,frame):
    now = deepcopy(grid)
    unbind(frame)
    move_all(board,event)
    if is_game_over(board) == True:
        if max(max(grid)) >= 2048:
            gui.game_over(board,True)
        else:
            gui.game_over(board,False)
    else:
        bind(frame,board)
        if now != grid:
            add_random_number(board)

def merge(board,mky):
    c_x,c_y = gui.find_position(board,mky)
    for k in board.numbers:
        c_mkey = k
        if c_mkey != mky:
            x,y = gui.find_position(board,c_mkey)
            if x == c_x and y == c_y:
                board.numbers.pop(mky)
                gui.remove_number(board,c_mkey)
                gui.remove_number(board,mky)
                val = grid[x][y]
                r_value = gui.find_number(val)
                board.score += r_value.value
                gui.update_score(board)
                gui.put(board,c_mkey,r_value,x,y)
                return True
    return False

def bind(frame,board):
    for x in range(len(controls)):
        frame.bind(controls[x],lambda event: keyboard_callback(board,event.keysym,frame))
        
def unbind(frame):
    for x in range(len(controls)):
        frame.unbind(controls[x])

def is_game_over(board):
    size = len(grid) -1
    truth = True
    for x in range(len(grid)):
        for y in range(len(grid[x])):
            val = grid[x][y]
            if val == 0:
                truth = False
            if x > 0 and grid[x-1][y] == val:
                truth = False
            if y > 0 and grid[x][y-1] == val:
                truth = False
            if x < size and grid[x+1][y] == val:
                truth = False
            if y < size and grid[x][y+1] == val:
                truth = False
    return truth

if __name__ == '__main__':
    """Your Program will start here"""           
    frame, board = gui.setup()
    
    #Finishing setting up your GameBoard here, answer to Question 17 should go here
    r,c = add_random_number(board)
    r,c = add_random_number(board)
    mkey = find_identifier(board,r,c)

    bind(frame,board)
    gui.start(frame)




    

import numpy as np
import cv2
# load image
img = cv2.imread("1.jpeg")

# Convert BGR to HSV
hsv = cv2.cvtColor(img, cv2.COLOR_BGR2HSV)

# define range of black color in HSV
lower_val = np.array([0,0,0])
upper_val = np.array([50,100,105])

# Threshold the HSV image to get only black colors
mask = cv2.inRange(hsv, lower_val, upper_val)

# invert mask to get black symbols on white background
mask_inv = cv2.bitwise_not(mask)


cv2.imwrite('output.png',mask_inv);
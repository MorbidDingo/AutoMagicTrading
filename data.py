l = []
n = int(input('Enter the number of elements: '))

for i in range(n):
    i = int(input())
    l.append(i)

temp = 0
l2 = []

for i, j in enumerate(l):
    temp = l[i-1]

    if j != temp:
        l2.append(temp)

print(l2)

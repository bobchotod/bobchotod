row_col= int(input())

matrix = []
counter = 1

for row in range(row_col):
    matrix.append([])
    for col in range(row_col):
        matrix[row].append(counter)
        counter +=1
print(*matrix, sep="\n")
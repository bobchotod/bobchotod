max_set = set()
max_len = 0
n = int(input())

for i in range(n):
    a, b = input().split("-")
    a, b = list(map(int, a.split(", "))), list(map(int, b.split(", ")))

    range1_start = a[0]; range1_end = a[1]
    range2_start = b[0]; range2_end = b[1]

    range1 = set(int(x) for x in range(range1_start, range1_end+1))
    range2 = set(int(x) for x in range(range2_start, range2_end+1))
    intersection = range2.intersection(range1)

    if len(intersection) >= max_len:
        max_len = len(intersection)
        max_set = intersection

print(f"The longest intersection is {list(max_set)} with length {max_len}")

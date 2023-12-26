disp("Задание 3")
n = 20
Xm = 180.23
S = 0.1
alpha = 0.05

t_alpha_2 = cdft('T', n-1, 1-alpha/2, alpha/2)

lower = Xm - t_alpha_2*S/sqrt(n)
upper = Xm + t_alpha_2*S/sqrt(n)

disp("Нижний")
disp(lower)
disp("Верхний")
disp(upper)



disp("      Задание 1.1")
mat = grand(10, 10, "geom", 0.2)
disp(mat)

disp("      Задание 1.2")
plot3d(mat)
disp("Минимальный элемент")
disp(min(mat))
disp("Максимальный элемент")
disp(max(mat))

//Я не разобрался в find() и, видимо, другая половина интернета тоже не разобралась
min_x=-1
min_y=-1
max_x=-1
max_y=-1

for i=1:10
    for j = 1:10
        if (mat(i,j)==min(mat) && min_x==-1)
            min_y=i
            min_x=j
        end
        if (mat(i,j)==max(mat) && max_x==-1)
            max_y=i
            max_x=j
        end
    end
end
disp("Минимальный элемент на")
disp(min_x)
disp(min_y)
disp("Максимальный элемент на")
disp(max_x)
disp(max_y)


disp("      Задание 1.3")
disp(mean(mat))
disp(mean(mat, 'r'))
disp(mean(mat, 'c'))

disp("      Задание 1.4")
mat2=[]
for i=1:10
    for j=1:10
        mat2(i,j)=modulo(i+j,2)
    end
end
disp(mat2)

disp(meanf(mat, mat2))

disp("      Задание 1.5")
disp(median(mat, 'r'))
disp(variance(mat))
disp(stdevf(mat, mat2))

disp("      Задание 1.6")
disp(tabul(mat))

disp("      Задание 1.7")
n = floor(1+3.322*log(10))
[cf, ind] = histc(n, mat, normalization=%f)
disp(cf)
disp(ind)

disp("      Задание 1.8")
disp(gsort(mat, 'g', 'i'))

disp("Задание 2")
poi = grand(1,1000,"poi",10)
n = ceil(1+3.322*log(length(poi)))
poi_min = min(poi)
poi_max = max(poi)
h = floor((poi_max-poi_min)/n)
[cf, ind] = histplot(n, poi, normalization=%f)

poi_i = poi_min+h*(0:n)
poi_mean = mean(poi)
poi_var = variance(poi)

for i = 1:n+1
    [P(i), Q(i)] = cdfpoi('PQ', poi_i(i), poi_mean)
end
for j = 1:n
    d(j)=length(poi)*(P(j+1)-P(j))
end

chi_p = (cf-d').^2/d'
chi_sq = sum(chi_p)
nu = n-1
alpha = 0.05
chi_tab = cdfchi('X', nu, 1-alpha, alpha)
disp(chi_sq-chi_tab)

disp("Задание 3")
n = 25
Xm = 91.25
S = 0.09
alpha = 0.05

t_alpha_2 = cdft('T', n-1, 1-alpha/2, alpha/2)

lower = Xm - t_alpha_2*S/sqrt(n)
upper = Xm + t_alpha_2*S/sqrt(n)

disp("Нижний")
disp(lower)
disp("Верхний")
disp(upper)


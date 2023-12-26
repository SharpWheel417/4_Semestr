function I = LastX(arr)
    for i = 1:1:length(arr)
        if arr(i) < 0
            I = i - 1
            break
        end
    end
endfunction


function dy = Syst(t,y)
    dy(1) = y(1)
    dy(2) = y(2)
    dy(3) = y(3)
    dy(4) = y(4) 
    dy(1) = y(2)
    dy(2) = -0.4 * 1.225 * %pi * 0.2^2 / (2 * 10) * sqrt(y(2)^2 + y(4)^2)*y(2)
    dy(3) = y(4)
    dy(4) = -9.81 - 0.4 * 1.225 * %pi * 0.2^2 / (2 * 10) * sqrt(y(2)^2 + y(4)^2)*y(4)
endfunction

Angle = 25
V = 100
Y0 = [0; V*cos(Angle*%pi/180); 0; V*sin(Angle*%pi/180)]//Вычислим Y нулевое
t = 0:0.01:10
arr = ode(Y0, 0, t, Syst)//Формирование массива
point = 3//Точка, куда должно попасть ядро
E = 0.001//Точность
i = 1


while abs(arr'(LastX(arr'(:,3)),1) - point) > E//Пока более точности
    if arr'(LastX(arr'(:,3)),1) > point
        Angle = Angle - 45 / 2^i
    else
        Angle = Angle + 45 / 2^i
    end
    Y0 = [0; V*cos(Angle*%pi/180); 0; V*sin(Angle*%pi/180)]
    arr = ode(Y0, 0, t, Syst)
    i = i + 1
    if i > 100
        break
    end
end
printf("Угол, при котором выстреленное ядро попадёт в точку point:\n%f",Angle)

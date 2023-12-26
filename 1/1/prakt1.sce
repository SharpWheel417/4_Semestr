V = 100;
angle = 25;//Угол в градусах
h=10
g = 9.81//Гравитация

x=[];y=[];//Переменные для графика
temp=1

while angle<=25+2*h
    rad_angle = angle*(%pi/180)//Угол в радианах
    T = ((2*V)*sin(rad_angle))/g//Время полёта
    L = ((2*V^2)*sin(rad_angle))/g//Дальность полёта
    disp(temp)
    temp=temp+1
    disp("Время будет:")
    disp(T)
    disp("Дальность будет:")
    disp(L)
    
    Vx=V*cos(rad_angle)
    Vy=V*sin(rad_angle)
    t=linspace(0,T,10)
    for i=1:3
        X=Vx*t
        Y=Vy*t-0.5*(g*t^2)
        
        x=[x,X]
        y=[y,Y]
    end
    plot(x,y)
    
    angle=angle+h
end

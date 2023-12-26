V = 100
angle = 25; h=10

t = 0:0.01:10

function dy = System(t,y)
    dy(1) = y(1)
    dy(2) = y(2)
    dy(3) = y(3)
    dy(4) = y(4) 
    dy(1) = dy(2)
    dy(2) = -0.3 * 1.225 * %pi * 0.2^2 / (2 * 10) * sqrt(dy(2)^2 + dy(4)^2)*dy(2)
    dy(3) = dy(4)
    dy(4) = -9.81 - 0.3 * 1.225 * %pi * 0.2^2 / (2 * 10) * sqrt(dy(2)^2 + dy(4)^2)*dy(4)
endfunction

while angle<=25+2*h
    Y = [0; V*cos(angle*%pi/180); 0; V*sin(angle*%pi/180)]
    Diff = ode(Y, 0, t, System)
    plot(Diff'(:,1), Diff'(:,3))
    angle=angle+h
end

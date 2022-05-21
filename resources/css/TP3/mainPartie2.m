%Par Hatem Mnaouer - INDP1A
clear all;close all;clc;
%question 1

%Au debut on choisir xmin et xmax les valeurs maximales et minimales
%atteintes par les intensités qui serviront ensuite comme notre
%'intervalle'
%Ensuite la variable scale une fois multipliée * x permet d'obtenir dans q
%des valeurs quantifiée comprises entre 0 et L-1
%Enfin on stocque le mot de code dans q

%Question 2
[Lena]=imread('lena.tif') ;
Lena = rgb2gray(Lena);
LenaQ = imquantize(Lena,8);

%Question 3
subplot(1,2,1); imshow(Lena);
subplot(1,2,2); imshow(LenaQ);

%Question 4
[H,L] = size(Lena)
EQM = (1/ (H*L) ) * sum(sum((Lena-LenaQ).^2));

%question 5
RSB=10*log10(var( double(Lena(:)) ))/EQM

%question 6
figure;
title('Image originale');
subplot(4,2,1); imshow(Lena);
arrR = [RSB];
for i=7:-1:1
    LenaQ = imquantize(Lena,i);
    [H,L] = size(Lena);
    subplot(4,2,8-i+1); imshow(LenaQ);
    EQM = (1/ (H*L) ) * sum(sum((Lena-LenaQ).^2));
    RSB=10*log10(var( double(Lena(:)) ))/EQM;

    arrR = [arrR, RSB];
end;


%question 7

%Comme prévu, plus on diminue les bits de quantification plus la qualité
%visuelle de l'image se dégrade

%question 8

figure ;
semilogy( [8:-1:1] , (arrR ) ) ; 
title ('Valeur du RSB en fonction du nombre de bits de quantification');
xlabel('Nombre de bits de quantification') ; 
ylabel('RSB') ; 




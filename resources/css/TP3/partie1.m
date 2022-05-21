%Par Hatem Mnaouer - INDP1A
clear all;close all;clc;

%question1
[I]=imread('pout.tif') ;

%question 2
title ('pout.tf');
imshow(I);

%question 3
[ H,L ] = size(I);
bits = H * L * 8;
fprintf('La hauteur : %d \nLa largeur : %d\nNombre de bits : %d\n', H, L, bits);

%question 4
[I2]=imread('peppers.jpg') ;
figure;
title ('peppers.jpg');
imshow(I2);
[ H,L ] = size(I2);
bits = H * L * 8 * 3;
fprintf('\nLa hauteur : %d \nLa largeur : %d\nNombre de bits : %d\n', H, L, bits);


%question 5

% On voit bien que l'image scalaire est sans couleurs et l'image
% vectorielle est colorée

% Essayons d'afficher les composantes de l'image vectorielle une à une en
% niveaux de gris
subplot(2,2,1); imshow(I2); title('Image complète');
subplot(2,2,2); imshow(I2(:,:,1)); title('Composante rouge');
subplot(2,2,3); imshow(I2(:,:,2)); title('Composante verte');
subplot(2,2,4); imshow(I2(:,:,3)); title('Composante bleue');



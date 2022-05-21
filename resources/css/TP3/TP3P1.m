clc 
clear all 
close all  
disp('Image 1 ') ; 
[I]=imread('pout.tif') ; 
figure ; 
imshow(I) ; 

l=size(I,1) ; 
c=size(I,2) ; 
disp('Nombre de lignes = ')
disp(l) ; 
disp('Nombre de colonnes = ')
disp(c) ;
n_bit=round (log2(max(double(I(:)))))  ;
disp('nombre de bits de quantification ') ;
disp(n_bit) ; 
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%ù

disp('Image 2 ') ; 
[J]=imread('peppers.jpg') ; 
figure ; 
imshow(J) ; 

l=size(J,1) ; 
c=size(J,2) ; 
disp('Nombre de lignes = ')
disp(l) ; 
disp('Nombre de colonnes = ')
disp(c) ;
n_bit=round (log2(max(double(J(:)))))  ;
disp('nombre de bits de quantification ') ;
disp(n_bit) ;
%image scalaire  
size(I,3) % ==1 ; 
%image vectorielle 
size(J,3) %!=1 ; 
figure 
%J(:,:,1)=zeros(l,c)
J(:,:,3)=zeros(l,c)

imshow(J)

figure 
imshow(J(:,:,2))

figure 
imshow(J(:,:,1))

